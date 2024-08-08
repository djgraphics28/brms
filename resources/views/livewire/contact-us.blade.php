<div>
  <x-hero class="text-black" backgroundImage="{{ asset('images/contactus.jpg') }}" />

  <x-container>
      <h2 class="mb-8 text-4xl">
          Contact Us Form
      </h2>

      <form wire:submit.prevent="submit">
          <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input type="text" wire:model="name" id="name" class="mt-1 block w-full" required>
              @error('name')
                  <span class="text-red-600">{{ $message }}</span>
              @enderror
          </div>

          <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" wire:model="email" id="email" class="mt-1 block w-full" required>
              @error('email')
                  <span class="text-red-600">{{ $message }}</span>
              @enderror
          </div>

          <div class="mb-4">
              <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
              <textarea wire:model="message" id="message" class="mt-1 block w-full" rows="4" required></textarea>
              @error('message')
                  <span class="text-red-600">{{ $message }}</span>
              @enderror
          </div>

          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded" wire:loading.attr="disabled">
              <span wire:loading.remove>Submit</span>
              <span wire:loading>Loading...</span>
          </button>
      </form>
  </x-container>
</div>
