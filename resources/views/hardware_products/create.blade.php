@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800">Novo Produto de Hardware</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded my-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hardware_products.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Descrição:</label>
            <textarea name="description" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Preço:</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700">Estoque:</label>
                <input type="number" name="stock" value="{{ old('stock') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Salvar Produto
            </button>
        </div>
    </form>
</div>
@endsection
