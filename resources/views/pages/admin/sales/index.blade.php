@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-4/5">
            <h1 class="text-3xl font-semibold text-center mb-4">Lista de Vendas</h1>
            <div class="flex justify-between">
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.sellers') }}"
                        class="block bg-blue-700 text-white rounded-lg py-2 px-4 mb-4 hover:bg-blue-800 transition duration-300 ease-in-out">
                        Listagem de vendedores
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.home') }}"
                        class="block bg-blue-700 text-white rounded-lg py-2 px-4 mb-4 hover:bg-blue-800 transition duration-300 ease-in-out">
                        Voltar
                    </a>
                </div>
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">#</th>
                        <th class="border p-2">Vendedor</th>
                        <th class="border p-2">Valor da Venda</th>
                        <th class="border p-2">Data da Venda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesData as $saleData)
                        <tr class="text-center">
                            <td class="border p-2">{{ $saleData['id'] }}</td>
                            <td class="border p-2">
                                <a href="{{ route('admin.seller.detail', $saleData['seller']['id']) }}">
                                    {{ $saleData['seller']['name'] }}
                                </a>
                            </td>
                            <td class="border p-2">R$ {{ number_format($saleData['amount'], 2, ',', '.') }}</td>
                            <td class="border p-2">{{ date('d/m/Y', strtotime($saleData['created_at'])) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
