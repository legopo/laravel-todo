<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.task') }}{{ __('messages.create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-2 col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.create') }}
                </div>
                <div class="p-6">
                    <form id="create-task-form" action="{{ route('tasks.store', ['group' => $group->id]) }}" method="post" class="w-full">
                        @csrf
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                    {{ __('messages.name') }}
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="date">
                                    {{ __('messages.due_date') }}
                                </label>
                                <x-datepicker />
                                @error('due_date')
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-5">
                                <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="detail">
                                    {{ __('messages.detail') }}
                                </label>
                                <textarea id="detail" name="detail" rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('detail') is-invalid @enderror">
                                    {{ old('detail') }}
                                </textarea>
                                @error('detail')
                                <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-5">
                                <div class="mt-2">
                                    <div>
                                        <label class="inline-flex items-center">
                                            <span class="mr-2 text-gray-700 text-xs font-bold">{{ __('messages.is_important') }}</span>
                                            <input id="is_important" type="checkbox" name="is_important" value="1" class="form-checkbox">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center my-3 w-full">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('messages.store') }}
                                </button>
                            </div>
                            <div class="text-center my-3 w-full">
                                <a href="{{ route('home') }}">
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
    </div>
</x-app-layout>
