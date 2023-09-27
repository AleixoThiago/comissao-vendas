@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-3xl font-semibold text-center mb-4">Detalhes do Vendedor</h1>
            <a href="/admin/sellers" class="block text-blue-700 hover:underline mb-4 text-center">Voltar para a Lista de Vendedores</a>
            <div class="mb-4 flex items-end">
                <h2 class="text-xl font-semibold">Nome:</h2>
                <p class="text-gray-700 ml-1">{{ $sellerData['name'] }}</p>
            </div>
            <div class="mb-4 flex items-end">
                <h2 class="text-xl font-semibold">E-mail:</h2>
                <p class="text-gray-700 ml-1">{{ $sellerData['email'] }}</p>
            </div>
            <div class="mb-4 flex items-end">
                <h2 class="text-xl font-semibold">Quantidade de Vendas:</h2>
                <p class="text-gray-700 ml-1">{{ $sellerData['totalSales'] }}</p>
            </div>
            <div class="mb-4 flex items-end">
                <h2 class="text-xl font-semibold">Valor Total das Vendas:</h2>
                <p class="text-gray-700 ml-1">R$ {{ number_format($sellerData['totalAmount'], 2, ',', '.') }}</p>
            </div>
            <div class="mb-4 flex items-end">
                <h2 class="text-xl font-semibold">Comissão Total Recebida:</h2>
                <p class="text-gray-700 ml-1">R$ {{ number_format($sellerData['totalCommission'], 2, ',', '.') }}</p>
            </div>

            <div class="flex justify-center flex-col align-center">
                <a href="/admin/sales/create/{{ $sellerData['id'] }}" class="text-green-700 hover:underline text-center mt-4">Cadastrar Venda</a>
                <h2 class="text-xl font-semibold mt-2 text-center">Vendas Realizadas:</h2>
                <ul class="mt-2">
                    @for ($i = 0; $i < count($sellerData['sales']); $i++)
                        <li class="mb-2 text-center">
                            <p class="text-gray-700">Venda {{ $i + 1 }} - R$ {{ number_format($sellerData['sales'][$i]['amount'], 2, ',', '.') }} ({{ date('d/m/Y', strtotime($sellerData['sales'][$i]['sale_date'])) }})</p>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
