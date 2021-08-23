<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.password') }}{{ __('messages.edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-start-2 col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.edit') }}
                </div>
                <div class="p-6">
                    <form id="create-group-form" action="{{ route('users.password.update', ['user' => $user]) }}" method="post" class="w-full">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="w-full px-5">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_current">
                                {{ __('messages.current') }}{{ __('messages.password') }}
                            </label>
                            <input id="password_current" type="password" name="password_current" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_current') is-invalid @enderror">
                            @error('password_current')
                            <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full px-5">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                {{ __('messages.password') }}
                            </label>
                            <input id="password" type="password" name="password" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full px-5">
                            <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                                {{ __('messages.password_confirmation') }}
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center my-5 w-full">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('messages.update') }}
                            </button>
                        </div>
                        <div class="text-center my-5 w-full">
                            <a href="{{ route('users.show', ['user' => $user]) }}">
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
