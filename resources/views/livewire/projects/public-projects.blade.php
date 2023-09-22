<div class="space-y-4">
    <div class="p-4 rounded-md bg-white dark:bg-slate-800 shadow">
        <div class="text-lg dark:text-white">
            <span class="font-bold">TALL</span> CRUD: Portafolio de proyectos
        </div>

        <p class="text-justify  text-slate-800 dark:text-slate-300 ">
            Lorem, ipsum dolor sit amet consectetur
            adipisicing elit. Cupiditate deserunt excepturi vel animi voluptatum hic voluptates praesentium. Eius quis
            sed,
            nobis aliquam mollitia ratione ea nemo accusantium, atque, illum earum!
        </p>
    </div>

    <div class="w-full p-4 md:flex md:space-x-4">
        @foreach ($projects as $project)
            <div class="w-full mb-4">
                <livewire:project.project-card :$project :key="$project->id" />
            </div>
        @endforeach

    </div>

    {{ $projects->links() }}
</div>
