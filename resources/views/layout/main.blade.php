<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Name</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png" />

    <!-- Tailwind CSS compilado -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ url('/home') }}" class="flex items-center text-white font-semibold">
                    <i class="fas fa-house mr-2"></i> Home
                </a>

                <!-- Toggle (Mobile) - só visual, sem funcionalidade JS -->
                <div class="md:hidden">
                    <button class="text-gray-300 hover:text-white focus:outline-none" aria-label="Toggle menu">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Links Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center px-4 py-2 border border-white text-white rounded hover:bg-white hover:text-gray-800 transition">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 py-10 w-full">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-center py-4 text-gray-400 text-sm w-full">
        <div class="max-w-7xl mx-auto">
            <!-- Conteúdo do footer -->
        </div>
    </footer>

    <!-- FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
