<header class="text-white bg-black shadow">
  <x-container>
    <nav class="flex items-center justify-between py-4">
      <a
        wire:navigate
        href="/"
        class="flex items-center flex-shrink-0 mr-auto"
        aria-label="{{ config('app.name') }}"
      >
        <x-logo />
      </a>

      <!-- Navigation Menu -->
      <ul class="flex space-x-4 mr-auto">
        <li><a wire:navigate href="/" class="text-white hover:underline">HOME</a></li>
        <li><a wire:navigate href="/barangay-officials" class="text-white hover:underline">BARANGAY OFFICIALS</a></li>
        <li><a wire:navigate href="/documents" class="text-white hover:underline">DOCUMENTS</a></li>
      </ul>

      <div>
        {{-- <x-button
          :icon="Auth::check() ? 'heroicon-o-cog' : 'heroicon-s-user'"
          size="xs"
          :url="Filament\Pages\Dashboard::getUrl()"
        >
          {{ Auth::check() ? 'Manage' : 'Login' }}
        </x-button> --}}
      </div>
    </nav>
  </x-container>
</header>
