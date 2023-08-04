<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight text-sky-400/100">
            {{ __('User list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('users.create') }}">
                <x-primary-button class="mt-4 mb-1.5 bg-cyan-500 bg-blue-700">
                    {{ __('Create new user') }}
                </x-primary-button>
            </a>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-blue-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-700 text-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-yellow-200">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-yellow-200">
                                    {{ __("First Name") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-yellow-200">
                                    {{ __("Last Name") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-yellow-200">
                                    {{ __("Username") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-yellow-200">
                                    {{ __("Task") }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">{{ __("Action") }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600"
                                onclick="window.location='{{ route('users.tasks', ['user' => $user]) }}';">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->first_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($user->tasks as $index => $task)
                                    {{ $task->name . ", " }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('users.edit', ['user'=> $user->id]) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">
                                            {{ __('Edit') }}
                                        </button>
                                    </a>
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                        class="inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
