<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Detalhes da Visita</h1>

        <div class="space-y-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Usuário:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $visit->user->name }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Morador:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $visit->resident->name }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Data e Hora:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $visit->visit_date->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('visits.edit', $visit) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700">Editar</a>
            <form action="{{ route('visits.destroy', $visit) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700">Excluir</button>
            </form>
        </div>
    </div>
</x-app-layout>
