@extends('layouts.app')
@section('title','Novo Usuário')
@section('content')
<h1 class="text-2xl mb-4">Novo Usuário</h1>

<form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    <div><label class="block mb-1">Nome</label><input name="name" class="w-full p-2 border rounded" required></div>
    <div><label class="block mb-1">Email</label><input type="email" name="email" class="w-full p-2 border rounded" required></div>
    <div><label class="block mb-1">Senha</label><input type="password" name="password" class="w-full p-2 border rounded" required></div>
    <div><label class="block mb-1">Confirmar senha</label><input type="password" name="password_confirmation" class="w-full p-2 border rounded" required></div>
    <div>
        <label class="block mb-1">Role</label>
        <select name="role" class="w-full p-2 border rounded">
            <option value="barbeiro">Barbeiro</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Criar</button>
    </div>
</form>
@endsection
