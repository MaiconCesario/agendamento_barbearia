<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:manage-users']);
    }

    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,barbeiro',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado.');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$usuario->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:admin,barbeiro',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado.');
    }

    public function destroy(User $usuario)
    {
        if (auth()->id() === $usuario->id) {
            return redirect()->back()->with('error', 'Você não pode remover o usuário logado.');
        }

        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário removido.');
    }
}
