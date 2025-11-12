<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    $query = Agendamento::with(['cliente', 'barbeiro', 'servico']);

    if ($request->filled('barbeiro_id')) {
        $query->where('funcionario_id', $request->barbeiro_id);
    }

    if ($request->filled('data')) {
        $query->whereDate('data_hora', $request->data);
    }

    $agendamentos = $query->orderBy('data_hora', 'desc')->paginate(10);

    $barbeiros = \App\Models\User::whereIn('role', ['barbeiro', 'admin'])
        ->orderBy('name')
        ->get();

    return view('agendamentos.index', compact('agendamentos', 'barbeiros'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        $barbeiros = User::whereIn('role', ['barbeiro','admin'])->orderBy('name')->get();
        $servicos = Servico::orderBy('nome')->get();

        return view('agendamentos.create', compact('clientes','barbeiros','servicos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:users,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'observacao' => 'nullable|string',
        ]);

        $data['status'] = 'agendado';
        Agendamento::create($data);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado.');
    }

    public function show(Agendamento $agendamento)
    {
        $agendamento->load(['cliente','barbeiro','servico']);
        return view('agendamentos.show', compact('agendamento'));
    }

    public function edit(Agendamento $agendamento)
    {
        $clientes = Cliente::orderBy('nome')->get();
        $barbeiros = User::whereIn('role', ['barbeiro','admin'])->orderBy('name')->get();
        $servicos = Servico::orderBy('nome')->get();

        return view('agendamentos.edit', compact('agendamento','clientes','barbeiros','servicos'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:users,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora' => 'required|date',
            'status' => 'required|in:agendado,confirmado,cancelado,concluido',
            'observacao' => 'nullable|string',
        ]);

        $agendamento->update($data);
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado.');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento removido.');
    }
}
