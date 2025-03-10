@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar Produto de Hardware</h2>

        <!-- Mensagens de erro -->
        @if ($errors->any())
            <div class="p-4 mb-4 text-white bg-red-500 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Edição -->
        <form action="{{ route('hardware_products.update', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div>
                <label for="name" class="block text-gray-700">Nome:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Descrição -->
            <div>
                <label for="description" class="block text-gray-700">Descrição:</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Preço -->
            <div>
                <label for="price" class="block text-gray-700">Preço:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Estoque -->
            <div>
                <label for="stock" class="block text-gray-700">Estoque:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Botão de Atualização -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Atualizar Produto
                </button>
            </div>
        </form>

        <!-- Botão de Voltar -->
        <div class="mt-4">
            <a href="{{ route('hardware_products.index') }}" class="w-full text-center block px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">
                Voltar para a lista de produtos
            </a>
        </div>
    </div>
@endsection
