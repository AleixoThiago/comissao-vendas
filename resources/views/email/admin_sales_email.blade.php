@extends('layouts.mail')

@section('body')
    <div class="bg-gray-100 p-4 text-center">
        <h1 class="text-xl font-semibold mb-4">Relatório de Vendas do Dia</h1>
        <br>
        <p>Hoje foram realizadas <strong>{{ $totalSales }}</strong> vendas!</p>
        <p>O valor total dessas vendas é de: R$ {{ number_format($totalAmount, 2, ',', '.') }}</p>
    </div>
@endsection
