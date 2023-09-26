<x-layout>
    <div class="bg-gray-100 p-4 text-center">
        <h1 class="text-xl font-sembold mb-4">Relatório de Vendas do Dia</h1>

        <p>Olá, {{ $name }}! Abaixo está seu relatório de vendas do dia:</p>
        <br>
        <p>Você realizou um total de {{ $totalSales }} vendas hoje.</p>
        <p>O valor total de suas vendas foi: R$ {{ number_format($totalAmount, 2, ',', '.') }}</p>
        <p>E sua comissão é de: <strong>R$ {{ number_format($commission, 2, ',', '.') }}</strong>!</p>
    </div>
</x-layout>
