<div class="w-full rounded-md bg-white dark:bg-slate-800 shadow">
    <img src="{{ asset('storage/images/' . $project->image) }}" alt="Proyecto" class="w-full h-auto rounded-t-md">

    <div class="p-2">
        <h3 class="font-semibold text-gray-800 dark:text-white">{{ $project->title }}</h3>

        <p class="text-gray-700 dark:text-slate-300 text-sm">
            {{ $project->description }}
        </p>
    </div>
</div>
