@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-4/5">
            @if (session('success'))
                <h1 class="text-green-500">{{ session('success') }}</h1>
            @endif
            <h1 class="text-3xl font-semibold text-center mb-4">Vendedores</h1>
            <div class="flex justify-between">
                <div class="mt-4 text-center">
                    <a href="/admin/create/seller"
                        class="block bg-blue-700 text-white rounded-lg py-2 px-4 mb-4 hover:bg-blue-800 transition duration-300 ease-in-out">
                        Cadastrar Novo Vendedor
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <a href="/admin/home"
                        class="block bg-blue-700 text-white rounded-lg py-2 px-4 mb-4 hover:bg-blue-800 transition duration-300 ease-in-out">
                        Voltar
                    </a>
                </div>
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">#</th>
                        <th class="border p-2">Nome</th>
                        <th class="border p-2">E-mail</th>
                        <th class="border p-2">Percentual de comissão</th>
                        <th class="border p-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellersData as $sellerData)
                        <tr class="text-center">
                            <td class="border p-2">{{ $sellerData['id'] }}</td>
                            <td class="border p-2">{{ $sellerData['name'] }}</td>
                            <td class="border p-2">{{ $sellerData['email'] }}</td>
                            <td class="border p-2">{{ number_format($sellerData['commission_percentage'], 2, ',', '.') }}%
                            </td>
                            <td class="border p-2">
                                <a href="/admin/sellers/{{ $sellerData['id'] }}" class="text-blue-700 mr-2" title="Detalhes do vendedor">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </a>
                                <a href="/admin/sales?sellerId={{ $sellerData['id'] }}" class="text-purple-700 mr-2" title="Lista de vendas do vendedor">
                                    <span class="material-symbols-outlined">
                                        attach_money
                                    </span>
                                </a>
                                <a href="/admin/sales/create/{{ $sellerData['id'] }}"
                                    class="text-green-700" title="Cadastrar venda">
                                    <span class="material-symbols-outlined">
                                        add_shopping_cart
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
