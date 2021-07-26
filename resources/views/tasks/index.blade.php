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
                    <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded w-8/12 mx-auto">
                        {{ __('messages.create') }}
                    </button>
                </div>
                <div class="py-1">
                    <ul>
                        <li class="flex items-center h-8 px-4 py-1 hover:bg-gray-200">Item 1</li>
                        <li class="flex items-center h-8 px-4 py-1 hover:bg-gray-200">Item 2</li>
                        <li class="flex items-center h-8 px-4 py-1 hover:bg-gray-200">Item 3</li>
                        <li class="flex items-center h-8 px-4 py-1 hover:bg-gray-200">Item 4</li>
                    </ul>
                </div>
            </div>
            <div class="col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-200 py-4 pl-4">
                    {{ __('messages.task') }}
                </div>
                <div class="text-center my-3">
                    <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded w-8/12 mx-auto">
                        {{ __('messages.create') }}
                    </button>
                </div>
                <div class="py-1">
                    <div class="bg-white rounded my-6">
                        <table class="text-left w-full border-collapse table-fixed">
                            <thead>
                                <tr>
                                    <th class="w-1/2 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{ __('messages.name') }}</th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{ __('messages.is_important') }}</th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{ __('messages.is_completed') }}</th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{ __('messages.due_date') }}</th>
                                    <th class="w-1/8 py-2 px-2 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-2 border-b border-grey-light">あそぶ</td>
                                    <td class="py-2 px-2 border-b border-grey-light">☆</td>
                                    <td class="py-2 px-2 border-b border-grey-light">完了</td>
                                    <td class="py-2 px-2 border-b border-grey-light">2021/1/1</td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-blue-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.show') }}
                                        </button>
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-yellow-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.edit') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-2 border-b border-grey-light">あそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶあそぶ</td>
                                    <td class="py-2 px-2 border-b border-grey-light">☆</td>
                                    <td class="py-2 px-2 border-b border-grey-light">完了</td>
                                    <td class="py-2 px-2 border-b border-grey-light">2021/1/1</td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-blue-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.show') }}
                                        </button>
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-yellow-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.edit') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-2 border-b border-grey-light">あそぶ</td>
                                    <td class="py-2 px-2 border-b border-grey-light">☆</td>
                                    <td class="py-2 px-2 border-b border-grey-light">完了</td>
                                    <td class="py-2 px-2 border-b border-grey-light">2021/1/1</td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-blue-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.show') }}
                                        </button>
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-yellow-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.edit') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-2 border-b border-grey-light">あそぶ</td>
                                    <td class="py-2 px-2 border-b border-grey-light">☆</td>
                                    <td class="py-2 px-2 border-b border-grey-light">完了</td>
                                    <td class="py-2 px-2 border-b border-grey-light">2021/1/1</td>
                                    <td class="py-2 px-2 border-b border-grey-light">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-blue-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.show') }}
                                        </button>
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-1 my-1 text-xs border border-yellow-500 hover:border-transparent rounded mx-auto">
                                            {{ __('messages.edit') }}
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
