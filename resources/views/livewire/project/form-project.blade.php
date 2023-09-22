<div class="p-4">
    {{-- TODO: Eliminar proyecto --}}
    @if (!$isEditing)
        <form wire:submit.prevent="createProject">
        @else
            <form wire:submit.prevent="updateProject">
    @endif
    <h2 class="mb-4 text-xl font-bold dark:text-white">{{ $isEditing ? 'Editar ' : 'Crear ' }} proyecto</h2>

    <div class="md:flex md:space-x-4">
        <div class="mb-4 md:w-1/2">
            <label for="title" class="block text-gray-700 dark:text-white font-bold mb-2">Seleccione una
                imagen</label>
            <input type="file" id="image" wire:model="image"
                class="w-full rounded-lg dark:text-white dark:bg-gray-800" />

            <div class="mb-4 md:w-1/2">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-auto w-full" alt="Previsualización">
                @elseif ($project !== null && $project->image)
                    <img src="{{ asset('storage/images/' . $project->image) }}" class="mt-2 h-auto w-full"
                        alt="Previsualización">
                @endif
            </div>
        </div>

        <div class="mb-4 md:w-1/2">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-white font-bold mb-2">Título</label>
                <input type="text" id="title" wire:model="title"
                    class="w-full rounded-lg dark:text-white dark:bg-gray-800"
                    placeholder="Escribe el tituo de tu proyecto" />
            </div>

            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-white font-bold mb-2">Descripción</label>
                <textarea id="description" wire:model="description" class="w-full rounded-lg dark:text-white dark:bg-gray-800"
                    placeholder="Escribe la descripción de tu proyecto"></textarea>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-white font-bold mb-2">Publico o
                    Borrador</label>
                <select id="isPublic" wire:model="isPublic" class="w-full rounded-lg dark:text-white dark:bg-gray-800">
                    <option value="1">Publico</option>
                    <option value="0">Borrador</option>
                </select>
            </div>

            <button type="submit" class="p-4 md:p-2 w-full bg-green-600 hover:bg-green-500 text-white rounded-xl">Subir
                imagen</button>
        </div>
    </div>
    </form>


</div>
