<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Password Generator')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        .password-display {
            font-family: 'Courier New', monospace;
            font-size: 1.5rem;
            letter-spacing: 2px;
            background: #0f0f23;
            color: #00ff88;
            padding: 20px;
            border-radius: 10px;
            word-break: break-all;
        }
        .security-bar {
            height: 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .security-low { background: #dc3545; width: 25%; }
        .security-medium { background: #ffc107; width: 50%; }
        .security-high { background: #20c997; width: 75%; }
        .security-ultra { background: #0d6efd; width: 100%; }
        .level-badge {
            font-size: 1rem;
            padding: 8px 16px;
            border-radius: 20px;
        }
        .btn-generate {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            transition: transform 0.2s;
        }
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .history-item {
            border-left: 3px solid #667eea;
            background: #f8f9fa;
            margin-bottom: 8px;
            padding: 10px 15px;
            border-radius: 0 8px 8px 0;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-shield-alt"></i> Password Generator
            </a>
        </div>
    </nav>

    <div class="container py-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    @livewireScripts
    <script>
        window.addEventListener('notify', event => {
            alert(event.message);
        });
    </script>
</body>
</html>
