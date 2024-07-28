<!-- resources/views/livewire/document-modal.blade.php -->
<div>
    @if ($isOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-2xl mb-4">{{ $documentType }}</h2>
                <p>{{ $modalContent }}</p>
                <div class="mt-4 text-right">
                    <button wire:click="closeModal"
                        class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Close</button>
                </div>
            </div>
        </div>
    @endif
</div>
