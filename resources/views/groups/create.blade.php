<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.group') }}{{ __('messages.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-2 col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.create') }}
                </div>
                <div class="p-6">
                    <form id="create-group-form" action="{{ route('groups.store') }}" method="post" class="w-full">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <x-group-form />
                            <div class="text-center my-3 w-full">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('messages.create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
