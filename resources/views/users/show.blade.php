<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.user') }}{{ __('messages.show') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-2 col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.show') }}
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap -mx-3">
                        <div class="h-auto min-h-20 w-full px-5 mb-3 border-b rounded-none">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                {{ __('messages.name') }}
                            </label>
                            <div class="block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="h-auto min-h-20 w-full px-5 mb-3 border-b rounded-none">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                {{ __('messages.email') }}
                            </label>
                            <div class="block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="text-center my-3 w-full">
                            <a href="{{ route('users.edit', ['user' => $user]) }}">
                                <button type="button" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                    {{ __('messages.edit') }}
                                </button>
                            </a>
                        </div>
                        <div class="text-center my-3 w-full">
                            <a href="{{ route('home') }}">
                                <button type="button" class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                                    {{ __('messages.back') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-3 text-right my-3 w-full">
                    <a href="{{ route('users.password.edit', ['user' => $user]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.password') }}{{ __('messages.edit') }}
                    </a>
            </div>
        </div>
    </div>
</x-app-layout>
