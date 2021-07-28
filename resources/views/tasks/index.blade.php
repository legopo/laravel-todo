<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-span-1 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.group') }}
                </div>
                <div class="text-center my-3">
                    <a href="{{ route('groups.create') }}">
                        <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded w-8/12 mx-auto">
                            {{ __('messages.create') }}
                        </button>
                    </a>
                </div>
                <div class="py-1">
                    @if ($groups)
                    <ul>
                        @foreach ($groups as $group)
                        <li class="flex items-center h-8 px-4 py-1 hover:bg-gray-200 @if($groupId === $group->id) bg-gray-100 @endif">
                            <div class="w-full">
                                @if ($groupId === $group->id)
                                {{ $group->name }}
                                <div class="float-right">
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('groups.edit', ['group' => $group->id])">
                                                    {{ __('messages.group') }}{{ __('messages.edit')}}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </div>
                                @else
                                <a href="{{ route('tasks.index', ['group' => $group->id]) }}">{{ $group->name }}</a>
                                <div class="float-right">
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('groups.edit', ['group' => $group->id])">
                                                    {{ __('messages.group') }}{{ __('messages.edit')}}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.task') }}
                </div>
                <div class="text-center my-3">
                    <a href="{{ route('tasks.create') }}">
                        <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded w-8/12 mx-auto">
                            {{ __('messages.create') }}
                        </button>
                    </a>
                </div>
                <div class="py-1">
                    <div class="bg-white rounded my-6">
                        @if ($tasks)
                        <table class="text-left w-full border-collapse table-fixed">
                            <thead>
                                <tr>
                                    <th class="w-1/2 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        @sortablelink('name', trans('messages.name'))
                                    </th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        @sortablelink('is_important', trans('messages.is_important'))
                                    </th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        @sortablelink('is_completed', trans('messages.is_completed'))
                                    </th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        @sortablelink('due_date', trans('messages.due_date'))
                                    </th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-2 border-b text-sm border-grey-light">
                                        {{ $task->name }}
                                    </td>
                                    <td class="py-2 px-2 border-b text-sm border-grey-light">
                                        {{ $task->is_important_disp }}
                                    </td>
                                    <td class="py-2 px-2 border-b text-sm border-grey-light">
                                        {{ $task->is_completed_disp }}
                                    </td>
                                    <td class="py-2 px-2 border-b text-sm border-grey-light">
                                        {{ $task->due_date->format('Y/m/d') }}
                                    </td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                            <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-yellow-500 hover:border-transparent rounded mx-auto">
                                                {{ __('messages.edit') }}
                                            </button>
                                        </a>
                                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-blue-500 hover:border-transparent rounded mx-auto">
                                                {{ __('messages.show') }}
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="my-5 mx-5">
                            {{ $tasks->appends(request()->input())->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
