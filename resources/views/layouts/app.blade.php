<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Barbearia')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar fixa -->
    <nav class="fixed top-0 left-0 right-0 bg-gray-900 text-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            
            <!-- Nome da aplicação -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold hover:text-gray-300 transition">
                    Barbearia
                </a>
            </div>

            <!-- Links do menu -->
            <div class="hidden md:flex space-x-6 text-sm">
                <a href="{{ route('funcionarios.index') }}" class="hover:text-gray-300">Funcionários</a>
                <a href="{{ route('clientes.index') }}" class="hover:text-gray-300">Clientes</a>
                <a href="{{ route('servicos.index') }}" class="hover:text-gray-300">Serviços</a>
                <a href="{{ route('agendamentos.index') }}" class="hover:text-gray-300">Agendamentos</a>
            </div>

            <!-- Usuário logado e logout -->
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-sm text-gray-300">Olá, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button 
                            type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded transition"
                        >
                            Sair
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main class="max-w-7xl mx-auto mt-20 p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
