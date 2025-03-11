@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Produtos de Hardware</h2>

    {{-- @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded my-3">
            {{ session('success') }}
        </div>
    @endif --}}

    <div class="mt-4">
        <a href="{{ route('hardware_products.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Novo Produto
        </a>
    </div>

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Nome</th>
                    <th class="py-3 px-4 text-left">Preço</th>
                    <th class="py-3 px-4 text-left">Estoque</th>
                    <th class="py-3 px-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $product->id }}</td>
                        <td class="py-3 px-4">{{ $product->name }}</td>
                        <td class="py-3 px-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="py-3 px-4">{{ $product->stock }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <a href="{{ route('hardware_products.show', $product->id) }}"
                               class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('hardware_products.edit', $product->id) }}"
                               class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('hardware_products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
