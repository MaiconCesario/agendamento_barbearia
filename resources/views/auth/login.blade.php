<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Barbearia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input id="email" name="email" type="email" required autofocus class="w-full mt-1 border border-gray-300 p-2 rounded-md">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input id="password" name="password" type="password" required class="w-full mt-1 border border-gray-300 p-2 rounded-md">
            </div>

            <button class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Entrar</button>
        </form>
    </div>
</body>
</html>
