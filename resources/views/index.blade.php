<!DOCTYPE html>
<html lang="pt-BR" class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased w-full h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-xl px-8 py-10 space-y-6">
        <h1 class="text-2xl font-bold flex items-center gap-2 justify-center">
            <i class="fas fa-lock text-green-500"></i>
            Login
        </h1>

        @if(session('message'))
            <div class="bg-green-600 text-white rounded-md py-3 px-4 font-medium text-center shadow">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-700 text-white rounded-md py-3 px-4 font-medium shadow space-y-1">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold mb-1">E-mail</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    value="{{ old('email') }}"
                    placeholder="seu@email.com"
                    class="w-full rounded-md border border-gray-600 bg-gray-700 px-4 py-2 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                />
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-1">Senha</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    placeholder="••••••••"
                    class="w-full rounded-md border border-gray-600 bg-gray-700 px-4 py-2 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                />
            </div>

            <div class="pt-2 space-y-3">
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 active:bg-green-800 text-white font-semibold py-2.5 rounded-md shadow-md transition duration-150 ease-in-out"
                >
                    Entrar
                </button>

                <a
                    href="{{ route('register') }}"
                    class="block w-full text-center border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white font-medium py-2.5 rounded-md transition duration-150"
                >
                    Registrar
                </a>
            </div>
        </form>
    </div>

</body>
</html>
