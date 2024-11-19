<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Criar Novo Usuário</h1>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                <input type="password" name="password" id="password"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmação de Senha -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirme a Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Nível de Acesso -->
            <div>
                <label for="access_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nível de Acesso</label>
                <select name="access_level" id="access_level"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="0">Usuário Normal</option>
                    <option value="1">Administrador</option>
                </select>
                @error('access_level')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Enviar -->
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 dark:bg-blue-500 text-white dark:text-gray-100 font-semibold rounded-md shadow-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Criar Usuário
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
