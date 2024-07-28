<div>
  <x-hero title="Documents" />

  <x-container>
      <h2 class="mb-8 text-4xl text-center">
          DOCUMENTS REQUEST
      </h2>

      <!-- Display Success Message -->
      @if (session()->has('message'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session('message') }}</span>
          </div>
      @endif

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          @foreach (['Cedula', 'Barangay ID', 'Barangay Clearance', 'Certificate of Indigency'] as $documentType)
              <div class="border p-4 rounded-lg shadow-sm flex flex-col items-center text-center">
                  <h3 class="text-xl font-bold mb-2">{{ $documentType }}</h3>
                  <p class="mb-4">Description for {{ $documentType }} goes here.</p>
                  <div class="flex space-x-4">
                      <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                          Online Request
                      </button>
                      <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                          Requirements
                      </button>
                  </div>
              </div>
          @endforeach
      </div>

  </x-container>
</div>

@push('scripts')
  <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
  <script>
      document.addEventListener('livewire:load', function() {
          FilePond.create(document.querySelector('input[type="file"]'), {
              allowMultiple: false,
              maxFileSize: '5MB',
              server: {
                  process: '/upload',
                  revert: '/revert',
              }
          });
      });
  </script>
@endpush
