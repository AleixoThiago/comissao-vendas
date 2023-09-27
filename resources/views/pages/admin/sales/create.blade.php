@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-3xl font-bold text-center mb-4">{{ $sellerData['name'] }}</h1>
            <h2 class="text-2xl font-semibold text-center mb-4">Nova Venda</h2>
            @if (session('success'))
                <h1 class="text-green-500">{{ session('success') }}</h1>
            @endif
            @if ($errors->any())
                <h1 class="text-red-500">{{ $errors->first() }}</h1>
            @endif
            <form action="/admin/sales/create/{{ $id }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="amount" class="block text-gray-700 font-semibold mb-2">Valor da Venda:</label>
                    <input type="number" step="0.01" min="0.01" name="amount" id="amount"
                        class="w-full border rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-700 text-white rounded-lg py-2 px-4 hover:bg-blue-800 transition duration-300 ease-in-out">Cadastrar
                        Venda</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a href="/admin/sellers/{{ $id }}" class="block text-blue-700 hover:underline">Detalhes do Vendedor</a>
            </div>
        </div>
    </div>
@endsection
