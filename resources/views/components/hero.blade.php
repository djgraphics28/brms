@props([
  'title' => null,
  'afterTitle' => null,
  'backgroundImage' => null,
])

<div {{ $attributes->merge(['class' => 'py-16 text-white bg-primary-500 mb-8 h-72']) }} style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;">
  <x-container>
    <h1 class="text-4xl">{{ $title ?? $slot }}</h1>

    @if ($afterTitle)
      <div class="mt-4">
        {{ $afterTitle }}
      </div>
    @endif
  </x-container>
</div>
