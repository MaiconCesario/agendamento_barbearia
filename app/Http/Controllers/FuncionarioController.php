<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Lista todos os funcionários.
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Salva um novo funcionário no banco.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios',
            'senha' => 'required|min:6',
            'tipo' => 'required|in:admin,barbeiro',
        ]);

        Funcionario::create($validated);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um funcionário.
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Atualiza um funcionário existente.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'senha' => 'nullable|min:6',
            'tipo' => 'required|in:admin,barbeiro',
        ]);

        if (empty($validated['senha'])) {
            unset($validated['senha']);
        }

        $funcionario->update($validated);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Exclui um funcionário.
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
