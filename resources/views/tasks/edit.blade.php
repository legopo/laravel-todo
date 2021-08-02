<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.task') }}{{ __('messages.edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-2 col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.edit') }}
                </div>
                <div class="p-6">
                    <form id="edit-task-form" action="{{ route('tasks.update', ['group' => $group->id, 'task' => $task]) }}" method="post" class="w-full">
                        @csrf
                        @method('patch')
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                    {{ __('messages.title') }}
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name', $task->name) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="date">
                                    {{ __('messages.due_date') }}
                                </label>
                                @error('date')
                                <x-datepicker date="" />
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @else
                                <x-datepicker date="{{ old('date', $task->due_date) }}" />
                                @enderror
                            </div>
                            <div class="w-full px-5">
                                <span class="mr-2 text-gray-700 text-xs font-bold">{{ __('messages.is_completed') }}</span>
                                <label class="mr-4">
                                    <input type="radio" class="form-radio" name="is_completed" value="0" @if($task->is_completed === 0) checked @endif>
                                    <span class="ml-1 text-sm">{{ config('const.IS_COMPLETED.0') }}</span>
                                </label>
                                <label class="mr-4">
                                    <input type="radio" class="form-radio" name="is_completed" value="1" @if($task->is_completed === 1) checked @endif>
                                    <span class="ml-1 text-sm">{{ config('const.IS_COMPLETED.1') }}</span>
                                </label>
                            </div>
                            <div class="w-full px-5">
                                <div class="my-2">
                                    <label class="inline-flex items-center">
                                        <span class="mr-2 text-gray-700 text-xs font-bold">{{ __('messages.is_important') }}</span>
                                        <input id="is_important" type="checkbox" name="is_important" value="1" class="form-checkbox" @if ($task->is_important === 1)checked @endif>
                                    </label>
                                </div>
                            </div>
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="detail">
                                    {{ __('messages.detail') }}
                                </label>
                                <textarea id="detail" name="detail" rows="8" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('detail') is-invalid @enderror">{{ old('detail', $task->detail) }}</textarea>
                                @error('detail')
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center my-3 w-full">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('messages.update') }}
                                </button>
                            </div>
                            <div class="text-center my-3 w-full">
                                <a href="{{ route('tasks.show', ['group' => $group, 'task' => $task]) }}">
                                    <button type="button" class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                                        {{ __('messages.back') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-3 text-right my-3 w-full">
                <form id="destory-group-form" action="{{ route('tasks.destroy', ['group' => $group, 'task' => $task]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.destroy') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
