<div class="p-4">
    <table class="min-w-full ">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b dark:text-white">Proyecto</th>
                <th class="py-2 px-4 border-b dark:text-white">Descripción</th>
                <th class="py-2 px-4 border-b dark:text-white">Estado</th>
                <th class="py-2 px-4 border-b dark:text-white"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td class="py-2 px-4 dark:text-white">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/images/' . $project->image) }}" alt="Proyecto"
                                class="w-10 h-10 rounded-full mr-2">
                            <div class="font-bold ml-4">{{ $project->title }}</div>
                        </div>
                    </td>
                    <td class="py-2 px-4 dark:text-white text-center">{{ $project->description }}</td>
                    <td class="py-2 px-4 dark:text-white text-center">
                        {{ $project->isPublic ? 'Publico' : 'Borrador' }}
                    </td>
                    <td class="py-2 px-4 dark:text-white text-center" wire:click='editForm({{ $project->id }})'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 hover:text-yellow-400 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
