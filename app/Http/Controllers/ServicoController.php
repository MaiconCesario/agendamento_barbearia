<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicos = Servico::orderBy('nome')->paginate(15);
        return view('servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'duracao' => 'required|integer|min:1',
        ]);

        Servico::create($data);
        return redirect()->route('servicos.index')->with('success', 'Serviço criado.');
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    public function update(Request $request, Servico $servico)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'duracao' => 'required|integer|min:1',
        ]);

        $servico->update($data);
        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado.');
    }

    public function destroy(Servico $servico)
    {
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço removido.');
    }
}
