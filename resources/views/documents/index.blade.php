@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">📂 Documentos</h2>

    <a href="{{ route('upload.form') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        ➕ Adicionar Novo Documento
    </a>

    @if($documents->isEmpty())
        <p class="mt-4 text-gray-600">Nenhum documento encontrado.</p>
    @else
        <ul class="mt-4 space-y-2">
            @foreach($documents as $document)
                <li class="bg-gray-100 p-4 rounded-md flex justify-between items-center">
                    <span class="text-gray-800 font-medium">📄 {{ $document->title }}</span>
                    <a href="{{ route('document.show', $document->id) }}" class="text-indigo-600 hover:underline">Visualizar</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
