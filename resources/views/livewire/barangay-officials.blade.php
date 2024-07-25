<div>
    <x-hero title="Barangay Officials" />

    <x-container>
        <h2 class="mb-8 text-4xl text-center">
            BARANGAY OFFICIALS
        </h2>

        <!-- Barangay Captain -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-10 mx-auto" style="max-width: 300px;">
            <img src="{{ config('app.url') . '/storage/' . $capt->image }}" alt="{{ $capt->name }}"
                class="w-32 h-32 mx-auto rounded-full mb-4">
            <p class="text-2xl text-center font-bold">{{ $capt->name }}</p>
            <h3 class="text-lg font-bold mb-2 text-center">{{ $capt->position }}</h3>
        </div>

        <!-- Barangay Council Members -->
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($officials as $item)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="{{ config('app.url') . '/storage/' . $item->image }}" alt="{{ $item->name }}"
                        class="w-32 h-32 mx-auto rounded-full mb-4">
                    <p class="text-2xl text-center font-bold">{{ $item->name }}</p>
                    <h3 class="text-lg font-bold mb-2 text-center">{{ $item->position }}</h3>
                </div>
            @empty
                <p class="items-center">No Barangay Officials Yet</p>
            @endforelse

            {{-- <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/150" alt="Pedro Reyes" class="w-32 h-32 mx-auto rounded-full mb-4">
        <p class="text-2xl text-center font-bold">Pedro Reyes</p>
        <h3 class="text-lg font-bold mb-2 text-center">Barangay Councilor</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/150" alt="Ana Martinez" class="w-32 h-32 mx-auto rounded-full mb-4">
        <p class="text-2xl text-center font-bold">Ana Martinez</p>
        <h3 class="text-lg font-bold mb-2 text-center">Barangay Councilor</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/150" alt="Carlos Gonzales" class="w-32 h-32 mx-auto rounded-full mb-4">
        <p class="text-2xl text-center font-bold">Carlos Gonzales</p>
        <h3 class="text-lg font-bold mb-2 text-center">Barangay Councilor</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/150" alt="Elena Ramirez" class="w-32 h-32 mx-auto rounded-full mb-4">
        <p class="text-2xl text-center font-bold">Elena Ramirez</p>
        <h3 class="text-lg font-bold mb-2 text-center">Barangay Councilor</h3>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/150" alt="Elena Ramirez" class="w-32 h-32 mx-auto rounded-full mb-4">
        <p class="text-2xl text-center font-bold">Edwin Cruz</p>
        <h3 class="text-lg font-bold mb-2 text-center">Barangay Councilor</h3>
      </div> --}}
        </div>

    </x-container>
</div>
