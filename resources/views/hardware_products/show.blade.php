@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Detalhes do Produto</h2>

        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <strong class="text-gray-600">ID:</strong>
                <span class="text-gray-900">{{ $product->id }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Nome:</strong>
                <span class="text-gray-900">{{ $product->name }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Descrição:</strong>
                <p class="text-gray-900">{{ $product->description }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Preço:</strong>
                <span class="text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Estoque:</strong>
                <span class="text-gray-900">{{ $product->stock }}</span>
            </div>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('hardware_products.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition duration-200">Voltar para a lista</a>

            @if(session('status'))
                <div class="p-4 text-white bg-green-500 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 text-white bg-red-500 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
@endsection
