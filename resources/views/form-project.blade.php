<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($id)
                    <livewire:project.form-project :$id />
                @else
                    <livewire:project.form-project />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
