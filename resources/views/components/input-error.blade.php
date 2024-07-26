@props(['for'])

@error($for)
    <span class="text-red-600 text-sm">{{ $message }}</span>
@enderror
