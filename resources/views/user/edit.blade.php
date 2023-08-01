<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-sky-400/100 ">
            {{ __('User list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-blue-700">
                    {{ __("User edit") }}
                </div>
            </div>
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ $user->username }}" required autocomplete="name" :placeholder="__('Fill name')" />

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-input-label for="first-name" :value="__('First Name')" />

                    <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="first_name"
                        value="{{ $user->first_name }}" required autocomplete="first_name"
                        :placeholder="__('Fill first name')" />

                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-input-label for="last-name" :value="__('Last Name')" />

                    <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="last_name"
                        value="{{ $user->last_name }}" required autocomplete="last_name"
                        :placeholder="__('Fill last name')" />

                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <x-primary-button class="mt-4 bg-blue-700">
                    {{ __('Edit') }}
                </x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>
