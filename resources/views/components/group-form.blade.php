<div class="w-full px-5">
    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
        {{ __('messages.name') }}
    </label>
    <input id="name" type="text" name="name" value="{{ old('name', $group->name ?? '') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') is-invalid @enderror">
    @error('name')
    <div class="text-red-700 mb-1 text-sm">{{ $message }}</div>
    @enderror
</div>