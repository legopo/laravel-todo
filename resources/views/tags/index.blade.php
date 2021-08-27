<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    #{{ $tag }}
                </div>
                <div class="py-1">
                    <div class="bg-white rounded my-6">
                        @if (count($tasks) > 0)
                        <table class="text-left w-full border-collapse table-fixed">
                            <thead>
                                <tr>
                                    <th class="w-1/2 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        @sortablelink('name', trans('messages.title'))
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
                                        @if ($task->due_date){{ $task->due_date->format('Y/m/d') }}@endif
                                    </td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <a href="{{ route('tasks.show', ['group' => $task->group_id, 'task' => $task->id]) }}">
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
