<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Editar Morador</h1>

        <form action="{{ route('residents.update', $resident) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $resident->name) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Idade -->
            <div>
                <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Idade</label>
                <input type="number" name="age" id="age" value="{{ old('age', $resident->age) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('age')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Biografia -->
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Biografia</label>
                <textarea name="bio" id="bio" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('bio', $resident->bio) }}</textarea>
                @error('bio')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Atualizar -->
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 dark:bg-blue-500 text-white dark:text-gray-100 font-semibold rounded-md shadow-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Atualizar Morador
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
