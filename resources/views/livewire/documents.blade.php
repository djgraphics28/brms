<div>
    <x-hero title="Documents" />

    <x-container>
        <h2 class="mb-8 text-4xl text-center">
            DOCUMENTS REQUEST
        </h2>

        <!-- Display Success Message -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="border p-4 rounded-lg shadow-sm flex flex-col items-center text-center">
                <h3 class="text-xl font-bold mb-2">Cedula</h3>
                <p class="mb-4">You can claim the CEDULA within 48 hours upon submission of your online application.
                    Claimable from 8am-5pm</p>
                <div class="flex space-x-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                        onclick="openModal('cedulaRequestFormModal')">
                        Online Request
                    </button>
                    <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600"
                        onclick="openModal('cedulaModal')">
                        Requirements
                    </button>
                </div>
            </div>

            <div class="border p-4 rounded-lg shadow-sm flex flex-col items-center text-center">
                <h3 class="text-xl font-bold mb-2">Barangay ID</h3>
                <p class="mb-4">You can claim the Barangay identification within 48 hours upon submission of your
                    online application. Claimable from 8am-5pm</p>
                <div class="flex space-x-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                        onclick="openModal('barangayIDRequestFormModal')">
                        Online Request
                    </button>
                    <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600"
                        onclick="openModal('barangayIdModal')">
                        Requirements
                    </button>
                </div>
            </div>

            <div class="border p-4 rounded-lg shadow-sm flex flex-col items-center text-center">
                <h3 class="text-xl font-bold mb-2">Barangay Clearance</h3>
                <p class="mb-4">You can claim the barangay CLEARANCE within 48 hours upon submission of your online
                    application. Claimable from 8am-5pm</p>
                <div class="flex space-x-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                        onclick="openModal('barangayClearanceRequestFormModal')">
                        Online Request
                    </button>
                    <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600"
                        onclick="openModal('barangayClearanceModal')">
                        Requirements
                    </button>
                </div>
            </div>

            <div class="border p-4 rounded-lg shadow-sm flex flex-col items-center text-center">
                <h3 class="text-xl font-bold mb-2">Certificate of Indigency</h3>
                <p class="mb-4">You can claim the barangay indigency within 48 hours upon submission of your online
                    application. Claimable from 8am-5pm</p>
                <div class="flex space-x-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                        onclick="openModal('certificateOfIndigencyRequestFormModal')">
                        Online Request
                    </button>
                    <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600"
                        onclick="openModal('certificateOfIndigencyModal')">
                        Requirements
                    </button>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div id="cedulaRequestFormModal" class="modal hidden fixed z-10 inset-0 flex items-center justify-center"
            wire:ignore.self>
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-4/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('cedulaRequestFormModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Cedula Request Form</h3>

                    @if (session()->has('message'))
                        <div class="bg-green-500 text-white p-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitCedulaRequest" class="space-y-4">
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                    Name</label>
                                <input type="text" id="first_name" wire:model="first_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('first_name')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle
                                    Name</label>
                                <input type="text" id="middle_name" wire:model="middle_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('middle_name')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" id="last_name" wire:model="last_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('last_name')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" id="email" wire:model="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" wire:model="address"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('address')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth
                                    Date</label>
                                <input type="date" id="birth_date" wire:model="birth_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('birth_date')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="birthplace"
                                    class="block text-sm font-medium text-gray-700">Birthplace</label>
                                <input type="text" id="birthplace" wire:model="birthplace"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('birthplace')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="citizenship"
                                class="block text-sm font-medium text-gray-700">Citizenship</label>
                            <input type="text" id="citizenship" wire:model="citizenship"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('citizenship')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil
                                Status</label>
                            <input type="text" id="civil_status" wire:model="civil_status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('civil_status')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                            <input type="text" id="sex" wire:model="sex"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('sex')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="tin_no" class="block text-sm font-medium text-gray-700">TIN No</label>
                            <input type="text" id="tin_no" wire:model="tin_no"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tin_no')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="height" class="block text-sm font-medium text-gray-700">Height</label>
                                <input type="text" id="height" wire:model="height"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('height')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                <input type="text" id="weight" wire:model="weight"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('weight')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                            <input type="text" id="occupation" wire:model="occupation"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('occupation')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="total_gross_receipts_business"
                                    class="block text-sm font-medium text-gray-700">Total Gross Receipts from
                                    Business</label>
                                <input type="text" id="total_gross_receipts_business"
                                    wire:model="total_gross_receipts_business"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('total_gross_receipts_business')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="total_earnings_salaries_prof"
                                    class="block text-sm font-medium text-gray-700">Total Earnings from
                                    Salaries/Professions</label>
                                <input type="text" id="total_earnings_salaries_prof"
                                    wire:model="total_earnings_salaries_prof"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('total_earnings_salaries_prof')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="total_income_real_property"
                                    class="block text-sm font-medium text-gray-700">Total Income from Real
                                    Property</label>
                                <input type="text" id="total_income_real_property"
                                    wire:model="total_income_real_property"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('total_income_real_property')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="terms" class="inline-flex items-center">
                                <input type="checkbox" id="terms" wire:model="terms"
                                    class="form-checkbox text-blue-600">
                                <span class="ml-2 text-gray-700">I agree to the terms and conditions</span>
                            </label>
                            @error('terms')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="bg-gray-400"
                                wire:target="submitCedulaRequest"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">
                                <span wire:loading.remove wire:target="submitCedulaRequest">Submit</span>
                                <span wire:loading wire:target="submitCedulaRequest">Submitting...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="barangayIDRequestFormModal" class="modal hidden fixed z-10 inset-0 flex items-center justify-center"
            wire:ignore.self>
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-4/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('barangayIDRequestFormModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Barangay ID Request Form</h3>

                    @if (session()->has('message'))
                        <div class="bg-green-500 text-white p-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitBarangayIDRequest" class="space-y-4">
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                    Name</label>
                                <input type="text" id="first_name" wire:model="first_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle
                                    Name</label>
                                <input type="text" id="middle_name" wire:model="middle_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('middle_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                    Name</label>
                                <input type="text" id="last_name" wire:model="last_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                Address</label>
                            <input type="email" id="email" wire:model="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" wire:model="address"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth
                                    Date</label>
                                <input type="date" id="birth_date" wire:model="birth_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('birth_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact
                                    Number</label>
                                <input type="text" id="contact_number" wire:model="contact_number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('contact_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="precinct_number" class="block text-sm font-medium text-gray-700">Precinct
                                Number</label>
                            <input type="text" id="precinct_number" wire:model="precinct_number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('precinct_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                <input type="text" id="weight" wire:model="weight"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('weight')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="height" class="block text-sm font-medium text-gray-700">Height</label>
                                <input type="text" id="height" wire:model="height"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('height')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact
                                Person</label>
                            <input type="text" id="contact_person" wire:model="contact_person"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('contact_person')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_person_number" class="block text-sm font-medium text-gray-700">Contact
                                Person's Number</label>
                            <input type="text" id="contact_person_number" wire:model="contact_person_number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('contact_person_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="valid_id_1" class="block text-sm font-medium text-gray-700">Valid ID 1</label>
                            <input type="file" id="valid_id_1" wire:model="valid_id_1"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('valid_id_1')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="valid_id_2" class="block text-sm font-medium text-gray-700">Valid ID 2</label>
                            <input type="file" id="valid_id_2" wire:model="valid_id_2"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('valid_id_2')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="terms" class="inline-flex items-center">
                                <input type="checkbox" id="terms" wire:model="terms"
                                    class="form-checkbox text-blue-600">
                                <span class="ml-2 text-gray-700">I agree to the terms and conditions</span>
                            </label>
                            @error('terms')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="bg-gray-400"
                                wire:target="submitBarangayIDRequest"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">
                                <span wire:loading.remove wire:target="submitBarangayIDRequest">Submit</span>
                                <span wire:loading wire:target="submitBarangayIDRequest">Submitting...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="barangayClearanceRequestFormModal"
            class="modal hidden fixed z-10 inset-0 flex items-center justify-center" wire:ignore.self>
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-4/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('barangayClearanceRequestFormModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Barangay Clearance Request Form</h3>

                    @if (session()->has('message'))
                        <div class="bg-green-500 text-white p-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitBarangayClearanceRequest" class="space-y-4">
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                    Name</label>
                                <input type="text" id="first_name" wire:model="first_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle
                                    Name</label>
                                <input type="text" id="middle_name" wire:model="middle_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('middle_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                    Name</label>
                                <input type="text" id="last_name" wire:model="last_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                Address</label>
                            <input type="email" id="email" wire:model="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" wire:model="address"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth
                                    Date</label>
                                <input type="date" id="birth_date" wire:model="birth_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('birth_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <label for="birthplace" class="block text-sm font-medium text-gray-700">Birth
                                    Place</label>
                                <input type="text" id="birthplace" wire:model="birthplace"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('birthplace')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact
                                    Number</label>
                                <input type="text" id="contact_number" wire:model="contact_number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('contact_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="precinct_number" class="block text-sm font-medium text-gray-700">Precinct
                                    Number</label>
                                <input type="text" id="precinct_number" wire:model="precinct_number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('precinct_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select id="gender" wire:model="gender"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Choose</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil
                                    Status</label>
                                <select id="civil_status" wire:model="civil_status"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Choose</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                                @error('civil_status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
                            <input type="text" id="purpose" wire:model="purpose"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('purpose')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                <input type="text" id="weight" wire:model="weight"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('weight')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="height" class="block text-sm font-medium text-gray-700">Height</label>
                                <input type="text" id="height" wire:model="height"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('height')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact
                                Person</label>
                            <input type="text" id="contact_person" wire:model="contact_person"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('contact_person')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="name_of_parents_guardian"
                                class="block text-sm font-medium text-gray-700">Guardian/Parent Name</label>
                            <input type="text" id="name_of_parents_guardian" wire:model="name_of_parents_guardian"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('name_of_parents_guardian')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_number_parents"
                                class="block text-sm font-medium text-gray-700">Parent's Contact Number</label>
                            <input type="text" id="contact_number_parents" wire:model="contact_number_parents"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('contact_number_parents')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address_parents_guardian"
                                class="block text-sm font-medium text-gray-700">Parent's Guardian Address</label>
                            <input type="text" id="address_parents_guardian" wire:model="address_parents_guardian"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('address_parents_guardian')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="relationship"
                                class="block text-sm font-medium text-gray-700">Relationship</label>
                            <input type="text" id="relationship" wire:model="relationship"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('relationship')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="valid_id_1" class="block text-sm font-medium text-gray-700">Valid ID 1</label>
                            <input type="file" id="valid_id_1" wire:model="valid_id_1"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('valid_id_1')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="valid_id_2" class="block text-sm font-medium text-gray-700">Valid ID 2</label>
                            <input type="file" id="valid_id_2" wire:model="valid_id_2"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('valid_id_2')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="terms" class="inline-flex items-center">
                                <input type="checkbox" id="terms" wire:model="terms"
                                    class="form-checkbox text-blue-600">
                                <span class="ml-2 text-gray-700">I agree to the terms and conditions</span>
                            </label>
                            @error('terms')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="bg-gray-400"
                                wire:target="submitBarangayClearanceRequest"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">
                                <span wire:loading.remove wire:target="submitBarangayClearanceRequest">Submit</span>
                                <span wire:loading wire:target="submitBarangayClearanceRequest">Submitting...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="certificateOfIndigencyRequestFormModal"
            class="modal hidden fixed z-10 inset-0 flex items-center justify-center" wire:ignore.self>
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-4/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('certificateOfIndigencyRequestFormModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Certificate of Indigency Request Form</h3>

                    @if (session()->has('message'))
                        <div class="bg-green-500 text-white p-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submitCertificateOfIndigencyRequest" class="space-y-4">
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                    Name</label>
                                <input type="text" id="first_name" wire:model="first_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle
                                    Name</label>
                                <input type="text" id="middle_name" wire:model="middle_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('middle_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                    Name</label>
                                <input type="text" id="last_name" wire:model="last_name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                Address</label>
                            <input type="email" id="email" wire:model="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" wire:model="address"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="years_of_stay" class="block text-sm font-medium text-gray-700">Years of
                                Stay</label>
                            <input type="text" id="years_of_stay" wire:model="years_of_stay"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('years_of_stay')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="name_of_student" class="block text-sm font-medium text-gray-700">Name of
                                Student</label>
                            <input type="text" id="name_of_student" wire:model="name_of_student"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('name_of_student')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
                            <input type="text" id="purpose" wire:model="purpose"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('purpose')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact
                                    Number</label>
                                <input type="text" id="contact_number" wire:model="contact_number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('contact_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact
                                    Person</label>
                                <input type="text" id="contact_person" wire:model="contact_person"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('contact_person')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex space-x-4">

                            <div class="w-1/2">
                                <label for="relationship"
                                    class="block text-sm font-medium text-gray-700">Relationship</label>
                                <input type="text" id="relationship" wire:model="relationship"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('relationship')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="terms" class="inline-flex items-center">
                                <input type="checkbox" id="terms" wire:model="terms"
                                    class="form-checkbox text-blue-600">
                                <span class="ml-2 text-gray-700">I agree to the terms and conditions</span>
                            </label>
                            @error('terms')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="bg-gray-400"
                                wire:target="submitBarangayIDRequest"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">
                                <span wire:loading.remove wire:target="submitBarangayIDRequest">Submit</span>
                                <span wire:loading wire:target="submitBarangayIDRequest">Submitting...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div id="cedulaModal" class="modal hidden fixed z-10 inset-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-3/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('cedulaModal')">X
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Cedula Requirements</h3>
                    <p>Requirements for Cedula...</p>
                </div>
            </div>
        </div>

        <div id="barangayIdModal" class="modal hidden fixed z-10 inset-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-3/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('barangayIdModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Barangay ID Requirements</h3>
                    <p>Requirements for Barangay ID...</p>
                    <div class="mt-4">
                        <h4 class="font-bold mb-2">Upload 2 Valid IDs</h4>
                        <div class="flex space-x-4">
                            <div class="border border-gray-300 p-4 rounded-lg text-center">
                                <p>Valid ID 1</p>
                                <img src="https://via.placeholder.com/150" alt="Valid ID 1" class="w-64 h-40">
                            </div>
                            <div class="border border-gray-300 p-4 rounded-lg text-center">
                                <p>Valid ID 2</p>
                                <img src="https://via.placeholder.com/150" alt="Valid ID 2" class="w-64 h-40">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="barangayClearanceModal" class="modal hidden fixed z-10 inset-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-3/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('barangayClearanceModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Barangay Clearance Requirements</h3>
                    <p>Requirements for Barangay Clearance...</p>
                    <div class="mt-4">
                        <h4 class="font-bold mb-2">Upload 2 Valid IDs</h4>
                        <div class="flex space-x-4">
                            <div class="border border-gray-300 p-4 rounded-lg text-center">
                                <p>Valid ID 1</p>
                                <img src="https://via.placeholder.com/150" alt="Valid ID 1" class="w-64 h-40">
                            </div>
                            <div class="border border-gray-300 p-4 rounded-lg text-center">
                                <p>Valid ID 2</p>
                                <img src="https://via.placeholder.com/150" alt="Valid ID 2" class="w-64 h-40">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="certificateOfIndigencyModal"
            class="modal hidden fixed z-10 inset-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container w-3/5 h-3/5 bg-white rounded-lg shadow-lg z-50 overflow-y-auto">
                <div class="p-8 relative">
                    <div class="modal-close absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal('certificateOfIndigencyModal')">X</div>
                    <h3 class="text-2xl font-bold mb-4">Certificate of Indigency Requirements</h3>
                    <p>Requirements for Certificate of Indigency...</p>
                </div>
            </div>
        </div>

    </x-container>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
