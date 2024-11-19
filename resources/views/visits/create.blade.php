<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Agendar uma Visita</h1>

        <form action="{{ route('visits.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Seleção do Usuário -->
            <div>
                <label for="user" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuário</label>
                @if(auth()->user()->isAdmin())
                    <!-- Dropdown para Admin -->
                    <select name="user_id" id="user" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Escolha um usuário</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                @else
                    <!-- Campo bloqueado para usuários comuns -->
                    <input type="text" name="user_name" id="user_name" value="{{ auth()->user()->name }}" disabled
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-sm">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @endif
                @error('user_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Seleção do Morador -->
            <div>
                <label for="resident" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecione o Morador</label>
                <select name="resident_id" id="resident" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Escolha um morador</option>
                    @foreach($residents as $resident)
                        <option value="{{ $resident->id }}">{{ $resident->name }}</option>
                    @endforeach
                </select>
                @error('resident_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Data e Hora da Visita -->
            <div>
                <label for="visit_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data e Hora da Visita</label>
                <input type="datetime-local" name="visit_date" id="visit_date"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('visit_date')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Enviar -->
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 dark:bg-blue-500 text-white dark:text-gray-100 font-semibold rounded-md shadow-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Agendar Visita
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
