@extends('layouts.app')
@section('title','Editar Usuário')
@section('content')
<h1 class="text-2xl mb-4">Editar Usuário</h1>

<form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf @method('PUT')
    <div><label class="block mb-1">Nome</label><input name="name" value="{{ old('name', $usuario->name) }}" class="w-full p-2 border rounded" required></div>
    <div><label class="block mb-1">Email</label><input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="w-full p-2 border rounded" required></div>
    <div><label class="block mb-1">Senha (deixe em branco para manter)</label><input type="password" name="password" class="w-full p-2 border rounded"></div>
    <div><label class="block mb-1">Confirmar senha</label><input type="password" name="password_confirmation" class="w-full p-2 border rounded"></div>
    <div>
        <label class="block mb-1">Role</label>
        <select name="role" class="w-full p-2 border rounded">
            <option value="barbeiro" @selected($usuario->role === 'barbeiro')>Barbeiro</option>
            <option value="admin" @selected($usuario->role === 'admin')>Admin</option>
        </select>
    </div>
    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Atualizar</button>
    </div>
</form>
@endsection
