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

      <!-- Burger Menu Icon -->
      <button id="menu-toggle" class="lg:hidden flex items-center p-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>

      <!-- Navigation Menu -->
      <ul id="menu" class="hidden lg:flex space-x-4 mr-auto">
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

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="lg:hidden absolute top-16 left-0 w-full bg-black text-white">
    <ul class="flex flex-col space-y-4 p-4">
      <li><a wire:navigate href="/" class="text-white hover:underline">HOME</a></li>
      <li><a wire:navigate href="/barangay-officials" class="text-white hover:underline">BARANGAY OFFICIALS</a></li>
      <li><a wire:navigate href="/documents" class="text-white hover:underline">DOCUMENTS</a></li>
    </ul>
  </div>
</header>

<script>
  document.getElementById('menu-toggle').addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>
