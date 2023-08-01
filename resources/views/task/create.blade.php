<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-lime-400">
            {{ __('Task list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-lime-500">
                    {{ __("Task create") }}
                </div>
            </div>
            <form action="" method="POST">
                @csrf
                @method('POST')
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required
                        autocomplete="name" :placeholder="__('Fill task name')" />

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />

                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" required
                        autocomplete="description" :placeholder="__('Fill description')" />

                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <x-primary-button class="mt-4 bg-lime-500">
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>
