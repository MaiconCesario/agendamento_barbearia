@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-semibold">Clientes</h2>
            <p class="text-3xl">{{ \App\Models\Cliente::count() }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-semibold">Serviços</h2>
            <p class="text-3xl">{{ \App\Models\Servico::count() }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-semibold">Agendamentos</h2>
            <p class="text-3xl">{{ \App\Models\Agendamento::count() }}</p>
        </div>
    </div>
@endsection
