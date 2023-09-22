<div class="p-4">
    <table class="min-w-full ">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b dark:text-white">Proyecto</th>
                <th class="py-2 px-4 border-b dark:text-white">Descripción</th>
                <th class="py-2 px-4 border-b dark:text-white">Estado</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
