@extends('layouts.app')

@section('title', 'Generador de Contraseñas')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="text-center mb-4">
                    <i class="fas fa-key"></i> Generador de Contraseñas Seguras
                </h2>

                <div class="password-display mb-4 text-center">
                    {{ $generatedPassword }}
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-grow-1">
                                <div class="security-bar security-{{ strtolower(str_replace(' ', '-', $securityLevel)) }}"></div>
                            </div>
                            <span class="level-badge badge bg-{{ 
                                $securityLevel == 'Bajo' ? 'danger' : 
                                ($securityLevel == 'Medio' ? 'warning' : 
                                ($securityLevel == 'Alto' ? 'info' : 'primary'))
                            }}">
                                {{ $securityLevel }}
                            </span>
                        </div>
                        <div class="mt-2 text-muted">
                            <small>Entropía: {{ $entropy }} bits</small>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <button wire:click="copyToClipboard" class="btn btn-outline-primary">
                            <i class="fas fa-copy"></i> Copiar
                        </button>
                        <button wire:click="generatePassword" class="btn btn-generate text-white ms-2">
                            <i class="fas fa-sync-alt"></i> Generar
                        </button>
                    </div>
                </div>

                <hr>

                <h5 class="mb-3">Configuración</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Longitud: {{ $length }}</label>
                            <input type="range" class="form-range" min="4" max="64" 
                                   wire:model="length" wire:change="generatePassword">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="useUppercase" 
                                   wire:model="useUppercase" wire:change="generatePassword">
                            <label class="form-check-label" for="useUppercase">
                                <i class="fas fa-font"></i> Mayúsculas (A-Z)
                            </label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="useLowercase" 
                                   wire:model="useLowercase" wire:change="generatePassword">
                            <label class="form-check-label" for="useLowercase">
                                <i class="fas fa-font"></i> Minúsculas (a-z)
                            </label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="useNumbers" 
                                   wire:model="useNumbers" wire:change="generatePassword">
                            <label class="form-check-label" for="useNumbers">
                                <i class="fas fa-hashtag"></i> Números (0-9)
                            </label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="useSymbols" 
                                   wire:model="useSymbols" wire:change="generatePassword">
                            <label class="form-check-label" for="useSymbols">
                                <i class="fas fa-at"></i> Símbolos (!@#$%...)
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="row mb-4">
            <div class="col-6">
                <div class="stat-card">
                    <div class="stat-number">{{ $totalPasswords }}</div>
                    <div>Total Generadas</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="stat-number">{{ $avgEntropy }}</div>
                    <div>Entropía Promedio</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-history"></i> Historial</h5>
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                @if(count($passwordHistory) > 0)
                    @foreach($passwordHistory as $item)
                        <div class="history-item d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted">{{ Str::limit($item['password'], 20) }}</small>
                                <br>
                                <span class="badge bg-{{ 
                                    $item['security_level'] == 'Bajo' ? 'danger' : 
                                    ($item['security_level'] == 'Medio' ? 'warning' : 
                                    ($item['security_level'] == 'Alto' ? 'info' : 'primary'))
                                }}">
                                    {{ $item['security_level'] }}
                                </span>
                            </div>
                            <button wire:click="deletePassword({{ $item['id'] }})" 
                                    class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center">No hay contraseñas guardadas</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
