<div>
    <x-hero title="Documents" />

    <x-container>
        <h2 class="mb-8 text-4xl">
            Request Form
        </h2>

        <!-- Display Success Message -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="submit">
            <x-input-label for="" :value="__('What Type of Request do you want?')" />
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-12">
                @foreach (['Cedula', 'Barangay ID', 'Barangay Clearance', 'Certificate of Indigency'] as $documentType)
                    <div>
                        <label>
                            <input type="radio" wire:model="requestType" value="{{ $documentType }}">
                            {{ $documentType }}
                        </label>
                    </div>
                @endforeach
            </div>

            <hr>

            <x-input-label for="" :value="__('Please Fillout this form to proceed your request')" />

            <!-- Personal Information Row -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div class="mt-6">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <input placeholder="Juan" id="first_name" type="text" wire:model.defer="first_name"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    <x-input-error for="first_name" />
                </div>

                <div class="mt-6">
                    <x-input-label for="middle_name" :value="__('Middle Name')" />
                    <input placeholder="Borguz" id="middle_name" type="text" wire:model.defer="middle_name"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    <x-input-error for="middle_name" />
                </div>

                <div class="mt-6">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <input placeholder="dela Cruz" id="last_name" type="text" wire:model.defer="last_name"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    <x-input-error for="last_name" />
                </div>

                <div class="mt-6">
                    <x-input-label for="sufix" :value="__('Suffix')" />
                    <input placeholder="Jr, Sr, III" id="sufix" type="text" wire:model.defer="sufix"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    <x-input-error for="sufix" />
                </div>
            </div>

            <div class="mt-6">
                <x-input-label for="birth_date" :value="__('Birth Date')" />
                <input id="birth_date" type="date" wire:model.defer="birth_date"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" />
                <x-input-error for="birth_date" />
            </div>

            <div class="mt-6">
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <input id="contact_number" type="text" wire:model.defer="contact_number"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" />
                <x-input-error for="contact_number" />
            </div>

            <div class="mt-6">
                <p class="text-gray-600">
                    {{ __('Please ensure that your email address is active and regularly checked, as it will be used for important communications regarding your request.') }}
                </p>
                <x-input-label for="email" :value="__('Email')" />
                <input id="email" type="email" wire:model.defer="email"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" />
                <x-input-error for="email" />
            </div>

            <div class="mt-6">
                <x-input-label for="valid_id" :value="__('Upload Valid ID')" />
                <input type="file" id="valid_id" wire:model="valid_id" />
                <x-input-error for="valid_id" />
            </div>

            <!-- Accept Terms Checkbox -->
            <div class="mt-6">
                <label for="accept_terms" class="flex items-center">
                    <input type="checkbox" id="accept_terms" wire:model.defer="accept_terms" />
                    <span class="ml-2">{{ __('I accept the terms and conditions') }}</span>
                </label>
                <x-input-error for="accept_terms" />
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Submit
                </button>
            </div>
        </form>
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
