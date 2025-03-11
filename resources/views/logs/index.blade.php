@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Registros de Log</h2>

    <!-- Filtros -->
    <div class="my-4">
        <form method="GET" action="{{ route('logs.index') }}">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <select name="level" class="w-full md:w-1/3 px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-gray-200" onchange="this.form.submit()">
                    <option value="">Todos os níveis</option>
                    <option value="info" {{ request('level') === 'info' ? 'selected' : '' }}>Info</option>
                    <option value="warning" {{ request('level') === 'warning' ? 'selected' : '' }}>Warning</option>
                    <option value="error" {{ request('level') === 'error' ? 'selected' : '' }}>Error</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Tabela Responsiva -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left">Nível</th>
                    <th class="py-3 px-4 text-left">Mensagem</th>
                    <th class="py-3 px-4 text-left">Usuário</th>
                    <th class="py-3 px-4 text-left">Data/Hora</th>
                    <th class="py-3 px-4 text-left">Contexto</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200">
                @forelse ($logs as $log)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <td class="py-3 px-4">
                            @php
                                $badgeClass = match($log->level) {
                                    'info' => 'bg-blue-500',
                                    'warning' => 'bg-yellow-500',
                                    'error' => 'bg-red-500',
                                    default => 'bg-gray-500',
                                };
                            @endphp
                            <span class="px-2 py-1 text-white text-sm rounded {{ $badgeClass }}">
                                {{ ucfirst($log->level) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">{{ $log->message }}</td>
                        <td class="py-3 px-4">
                            {{ $log->user ? $log->user->name : 'Sistema' }}
                        </td>
                        <td class="py-3 px-4">
                            {{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="py-3 px-4">
                            @if ($log->context)
                                <pre class="text-xs bg-gray-200 dark:bg-gray-700 p-2 rounded">{{ json_encode(json_decode($log->context), JSON_PRETTY_PRINT) }}</pre>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500 dark:text-gray-400">Nenhum registro encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação Padrão -->
    <div class="mt-6">
        {{ $logs->links() }}
    </div>
</div>
@endsection
