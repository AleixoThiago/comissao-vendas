@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-3xl font-semibold text-center mb-4">Cadastro de Vendedor</h1>
            @if ($errors->any())
                <h1 class="text-red-500">{{ $errors->first() }}</h1>
            @endif
            <form action="{{ route('admin.create.seller') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nome</label>
                    <input type="text" name="name" id="name"
                        class="w-full border rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">E-mail</label>
                    <input type="email" name="email" id="email"
                        class="w-full border rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-700 text-white rounded-lg py-2 px-4 hover:bg-blue-800 transition duration-300 ease-in-out">Cadastrar</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('admin.sellers') }}" class="block text-blue-700 hover:underline">Voltar para a Lista de Vendedores</a>
            </div>
        </div>
    </div>
@endsection
