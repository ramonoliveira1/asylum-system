<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Todos os Moradores</h1>

        <div class="mb-6">
            <a href="{{ route('residents.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700">Cadastrar Morador</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Idade</th>
                    <th scope="col" class="px-6 py-3">Biografia</th>
                    <th scope="col" class="px-6 py-3 text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($residents as $resident)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $resident->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $resident->age ?? 'Não informado' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $resident->bio ?? 'Não informado' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('residents.edit', $resident) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Editar
                                </a>
                                <form action="{{ route('residents.destroy', $resident) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Nenhum morador cadastrado até o momento.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-6">
            {{ $residents->links() }}
        </div>
    </div>
</x-app-layout>
