<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight text-lime-400">
            {{ __('Task list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('tasks.create') }}">
                <x-primary-button class="mt-4 bg-lime-500 mb-1.5 ">
                    {{ __('Create new task') }}
                </x-primary-button>
            </a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  text-gray-50 bg-lime-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __("Task name") }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __("Task description") }}
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">{{ __("Action") }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index => $task)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600"
                                onclick="window.location='{{ route('tasks.show', ['task' => $task->id]) }}';">
                                <td class="px-6 py-4">
                                    {{ $task->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->description }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if ($task->user_id == Auth::user()->id)
                                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">
                                            {{ __('Edit') }}
                                        </button>
                                    </a>
                                    @endif
                                    @if ($task->user_id == Auth::user()->id || Auth::user()->is_admin == true)
                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                        class="inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>
                                    @endif
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
