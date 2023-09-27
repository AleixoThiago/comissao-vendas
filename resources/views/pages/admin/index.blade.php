@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-3xl font-semibold text-center mb-4">Painel de Administração</h1>
            <p class="text-gray-600 text-center mb-6">Administrador, aqui você acompanha as informações de vendas e
                vendedores.</p>
            <div class="text-center">
                <a href="{{ route('admin.sellers') }}"
                    class="block bg-blue-700 text-white rounded-lg py-2 px-4 mb-4 hover:bg-blue-800 transition duration-300 ease-in-out">Visualizar
                    Vendedores</a>
                <a href="{{ route('admin.sales') }}"
                    class="block bg-blue-700 text-white rounded-lg py-2 px-4 hover:bg-blue-800 transition duration-300 ease-in-out">Visualizar
                    Vendas</a>
            </div>
        </div>
    </div>
@endsection
