<div class="p-4">
    <button x-on:click="$wire.createForm()" class="p-4 bg-blue-700 hover:bg-blue-500 text-white rounded-lg flex">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Crear Proyecto
    </button>

    <livewire:projects.projects-table />
</div>
