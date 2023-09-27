@extends('layouts.default')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-3xl font-semibold text-center mb-4">Login - Comissão - Vendas</h1>
            <form action="/login" method="POST">
                @csrf
                @if ($errors->any())
                    <h4 class="text-red-500">{{ $errors->first() }}</h4>
                @endif
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">E-mail:</label>
                    <input type="email" id="email" name="email" class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Senha:</label>
                    <input type="password" id="password" name="password" class="w-full border rounded-lg px-3 py-2 mt-1">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-blue-700 text-white rounded-lg py-2 hover:bg-blue-800 transition duration-300 ease-in-out">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
