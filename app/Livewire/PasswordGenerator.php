<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GeneratedPassword;
use Illuminate\Support\Str;

class PasswordGenerator extends Component
{
    public $length = 16;
    public $useUppercase = true;
    public $useLowercase = true;
    public $useNumbers = true;
    public $useSymbols = true;
    public $generatedPassword = '';
    public $securityLevel = '';
    public $entropy = 0;
    public $passwordHistory = [];
    public $copied = false;

    public function generatePassword()
    {
        $characters = '';
        
        if ($this->useUppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($this->useLowercase) {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($this->useNumbers) {
            $characters .= '0123456789';
        }
        if ($this->useSymbols) {
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        }

        if (empty($characters)) {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
            $this->useLowercase = true;
        }

        $password = '';
        $charactersLength = strlen($characters);
        
        for ($i = 0; $i < $this->length; $i++) {
            $password .= $characters[random_int(0, $charactersLength - 1)];
        }

        $this->generatedPassword = $password;
        $this->calculateEntropy();
        $this->determineSecurityLevel();
        $this->savePassword();
    }

    public function calculateEntropy()
    {
        $poolSize = 0;
        
        if ($this->useUppercase) {
            $poolSize += 26;
        }
        if ($this->useLowercase) {
            $poolSize += 26;
        }
        if ($this->useNumbers) {
            $poolSize += 10;
        }
        if ($this->useSymbols) {
            $poolSize += 32;
        }

        if ($poolSize > 0) {
            $this->entropy = round($this->length * log($poolSize, 2), 2);
        }
    }

    public function determineSecurityLevel()
    {
        if ($this->entropy < 28) {
            $this->securityLevel = 'Bajo';
        } elseif ($this->entropy < 60) {
            $this->securityLevel = 'Medio';
        } elseif ($this->entropy < 80) {
            $this->securityLevel = 'Alto';
        } else {
            $this->securityLevel = 'Ultra Seguro';
        }
    }

    public function savePassword()
    {
        $password = new GeneratedPassword([
            'password' => $this->generatedPassword,
            'length' => $this->length,
            'use_uppercase' => $this->useUppercase,
            'use_lowercase' => $this->useLowercase,
            'use_numbers' => $this->useNumbers,
            'use_symbols' => $this->useSymbols,
            'security_level' => $this->securityLevel,
            'entropy' => $this->entropy,
        ]);
        $password->save();

        $this->loadPasswordHistory();
    }

    public function loadPasswordHistory()
    {
        $this->passwordHistory = GeneratedPassword::orderBy('created_at', 'desc')
            ->limit(50)
            ->get()
            ->toArray();
    }

    public function copyToClipboard()
    {
        $this->copied = true;
        $this->dispatch('copy-password', password: $this->generatedPassword);
        
        $this->js('navigator.clipboard.writeText("' . $this->generatedPassword . '")');
        
        $this->dispatch('notify', 'Contraseña copiada al portapapeles');
    }

    public function deletePassword($id)
    {
        GeneratedPassword::find($id)->delete();
        $this->loadPasswordHistory();
    }

    public function mount()
    {
        $this->generatePassword();
        $this->loadPasswordHistory();
    }

    public function render()
    {
        $totalPasswords = GeneratedPassword::count();
        $avgEntropy = GeneratedPassword::avg('entropy') ?? 0;
        $levelCounts = GeneratedPassword::selectRaw('security_level, COUNT(*) as count')
            ->groupBy('security_level')
            ->pluck('count', 'security_level')
            ->toArray();

        return view('livewire.password-generator', [
            'totalPasswords' => $totalPasswords,
            'avgEntropy' => round($avgEntropy, 2),
            'levelCounts' => $levelCounts,
        ]);
    }
}
