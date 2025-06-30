<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-bI+o6Wqc3uKNX9gTPfUvXld5v7T4jvK9gJ1kN1l2g8RJEKNm2rUSMbZSVPKKXR15a6S+I+uOM/v3+vqfnKIk5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>Login</title>
    <style>
        body {
            
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container mt-5 bg-dark text-white p-4 rounded w-25">
        <h2>Login</h2>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" >
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" min="8" class="form-control" id="password" name="password" required>
            </div>

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="submit" value="Entrar" class="btn btn-primary">
            <a href="{{ route('register') }}" class="btn btn-secondary">Registrar</a>
        </form>
    </div>
</body>
</html>
