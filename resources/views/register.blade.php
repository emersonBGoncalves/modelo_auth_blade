<!DOCTYPE html>
<html lang="pt-BR" class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png" />

    <!-- Tailwind CSS compilado -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased w-full h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-lg p-8 space-y-6">

        <h2 class="text-3xl font-semibold flex items-center gap-2 justify-center">
            <i class="fas fa-user-plus"></i> Registro
        </h2>

        @if($errors->any())
            <div class="bg-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-2 font-medium">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                />
            </div>

            <div>
                <label for="email" class="block mb-2 font-medium">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                />
            </div>

            <div>
                <label for="password" class="block mb-2 font-medium">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    minlength="8"
                    class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                />
            </div>

            <div>
                <label for="password_confirmation" class="block mb-2 font-medium">Confirmação de Senha</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    minlength="8"
                    class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                />
            </div>

            <div class="flex flex-col gap-4">
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded transition"
                >
                    Registrar
                </button>

                <a
                    href="{{ route('login') }}"
                    class="w-full text-center border border-gray-600 rounded py-2 hover:bg-gray-700 transition"
                >
                    Voltar ao Login
                </a>
            </div>
        </form>
    </div>

</body>
</html>
