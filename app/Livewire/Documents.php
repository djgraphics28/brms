<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\SchemaOrg\Schema;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestAutoResponseMail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Request; // Ensure this is the correct namespace for your model

class Documents extends Component
{
    use WithFileUploads, LivewireAlert;

    public $documentType;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;
    public $sex;
    public $birth_date;
    public $birthplace;
    public $contact_number;
    public $email;
    public $address;
    public $years_of_stay;
    public $purpose;
    public $precinct_number;
    public $gender;
    public $civil_status;
    public $height;
    public $weight;
    public $contact_person;
    public $contact_person_number;
    public $contact_person_emergency;
    public $contact_number_emergency;
    public $relationship;
    public $name_of_parents_guardian;
    public $address_parents_guardian;
    public $contact_number_parents;
    public $name_of_student;
    public $citizenship;
    public $tin_no;
    public $occupation;
    public $total_gross_receipts_business;
    public $total_earnings_salaries_prof;
    public $total_income_real_property;
    public $valid_id_1;
    public $valid_id_2;
    public $terms = false;

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'birth_date' => 'required|date',
        'email' => 'required|email',
        'requestType' => 'required|in:Cedula,Barangay ID,Barangay Clearance,Certificate of Indigency',
        'valid_id' => 'required|file|mimes:jpg,png,pdf|max:2048', // Updated to include pdf if needed
        'accept_terms' => 'required',
    ];

    public function submit()
    {
        $this->validate(); // Use the defined rules

        // Store the file in the 'public' directory and get the file path
        $filePath = $this->valid_id->store('public');

        // Extract the file name from the file path
        $fileName = basename($filePath);

        // Create a new Request and save it
        $request = new Request();
        $request->first_name = $this->first_name;
        $request->middle_name = $this->middle_name;
        $request->last_name = $this->last_name;
        $request->sufix = $this->sufix;
        $request->birth_date = $this->birth_date;
        $request->contact_number = $this->contact_number;
        $request->email = $this->email;
        $request->request_type = $this->requestType;
        $request->valid_id = $fileName; // Save only the file name

        if ($request->save()) {
            session()->flash('message', 'Request submitted successfully!');
            $this->reset();
        }
    }

    public function submitCedulaRequest()
    {

        $this->resetValidation();

        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'civil_status' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'tin_no' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'occupation' => 'required|string|max:255',
            'total_gross_receipts_business' => 'required|numeric',
            'total_earnings_salaries_prof' => 'required|numeric',
            'total_income_real_property' => 'required|numeric',
        ]);

        Request::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'birthplace' => $this->birthplace,
            'citizenship' => $this->citizenship,
            'civil_status' => $this->civil_status,
            'gender' => $this->sex,
            'tin_no' => $this->tin_no,
            'height' => $this->height,
            'weight' => $this->weight,
            'occupation' => $this->occupation,
            'total_gross_receipts_business' => $this->total_gross_receipts_business,
            'total_earnings_salaries_prof' => $this->total_earnings_salaries_prof,
            'total_income_real_property' => $this->total_income_real_property,
            'request_type' => "Cedula",
        ]);

        $emailData = [
            'name' => $this->first_name,
            'requestType' => "Cedula",
        ];

        Mail::to($this->email)->send(new RequestAutoResponseMail($emailData));

        $this->alert('success', 'Cedula request submitted successfully.');

        // Reset form fields
        $this->reset();
    }

    public function submitBarangayIDRequest()
    {
        $this->resetValidation();

        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'contact_number' => 'required|string|max:15',
            'precinct_number' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'contact_person' => 'required|string|max:255',
            'contact_person_number' => 'required|string|max:15',
            'valid_id_1' => 'required|image', // Max 1MB per file
            'valid_id_2' => 'required|image',
        ]);

        // Save the uploaded files
        $valid_id_1_path = $this->valid_id_1->store('public');
        $valid_id_2_path = $this->valid_id_2->store('public');

        // Extract the file name from the file path
        $validId1 = basename($valid_id_1_path);
        $validId2 = basename($valid_id_2_path);

        Request::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'contact_number' => $this->contact_number,
            'precinct_number' => $this->precinct_number,
            'weight' => $this->weight,
            'height' => $this->height,
            'contact_person' => $this->contact_person,
            'contact_person_number' => $this->contact_person_number,
            'valid_id_1' => $validId1,
            'valid_id_2' => $validId2,
            'request_type' => "Barangay ID",
        ]);

        $emailData = [
            'name' => $this->first_name,
            'requestType' => "Barangay ID",
        ];

        Mail::to($this->email)->send(new RequestAutoResponseMail($emailData));

        $this->alert('success', 'Barangay ID request submitted successfully.');

        // Reset form fields
        $this->reset();
    }

    public function submitBarangayClearanceRequest()
    {

        $this->resetValidation();

        // Validate input
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birthplace' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'purpose' => 'required',
            'years_of_stay' => 'required',
            // 'contact_person' => 'required|string',
            // 'contact_number' => 'required|string|max:15',
            // 'precinct_number' => 'required|string|max:255',
            // 'weight' => 'required|numeric',
            // 'height' => 'required|numeric',
            // 'name_of_parents_guardian' => 'required|string|max:255',
            // 'address_parents_guardian' => 'required|string|max:255',
            // 'contact_number_parents' => 'required|string|max:15',
            // 'relationship' => 'required|string',
            'valid_id_1' => 'required|image', // Max 1MB per file
            'valid_id_2' => 'required|image',
        ]);

        // Save the uploaded files
        $valid_id_1_path = $this->valid_id_1->store('public');
        $valid_id_2_path = $this->valid_id_2->store('public');

        // Extract the file name from the file path
        $validId1 = basename($valid_id_1_path);
        $validId2 = basename($valid_id_2_path);

        // Create a new request
        Request::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'birthplace' => $this->birthplace,
            'years_of_stay' => $this->years_of_stay,
            'purpose' => $this->purpose,
            // 'contact_number' => $this->contact_number,
            // 'precinct_number' => $this->precinct_number,
            // 'weight' => $this->weight,
            // 'height' => $this->height,
            // 'name_of_parents_guardian' => $this->name_of_parents_guardian,
            // 'address_parents_guardian' => $this->address_parents_guardian,
            // 'contact_number_parents' => $this->contact_number_parents,
            'valid_id_1' => $validId1,
            'valid_id_2' => $validId2,
            'request_type' => "Barangay Clearance",
        ]);

        // Success message
        $emailData = [
            'name' => $this->first_name,
            'requestType' => "Barangay Clearance",
        ];

        Mail::to($this->email)->send(new RequestAutoResponseMail($emailData));

        $this->alert('success', 'Barangay Clearance request submitted successfully.');

        // Reset form fields
        $this->reset();
    }


    public function submitCertificateOfIndigencyRequest()
    {
        $this->resetValidation();

        // Validate input
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'years_of_stay' => 'required',
            'name_of_student' => 'required',
            'purpose' => 'required',
            'contact_number' => 'required|string|max:15',
            'contact_person' => 'required|string|max:255',
            'relationship' => 'required|string|max:15',
        ]);

        // Create a new request
        Request::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'years_of_stay' => $this->years_of_stay,
            'purpose' => $this->purpose,
            'contact_number' => $this->contact_number,
            'contact_person' => $this->contact_person,
            'contact_person_number' => $this->contact_person_number,
            'relationship' => $this->relationship,
            'request_type' => "Certificate of Indigency",
        ]);

        $emailData = [
            'name' => $this->first_name,
            'requestType' => "Certificate of Indigency",
        ];

        Mail::to($this->email)->send(new RequestAutoResponseMail($emailData));

        $this->alert('success', 'Certificate of Indigency request submitted successfully.');
        // Reset form fields
        $this->reset();
    }


    public function render()
    {
        // SEO setup
        seo()
            ->title(config('app.name'))
            ->description('Request Documents...')
            ->canonical(route('documents'))
            ->addSchema(
                Schema::webPage()
                    ->name(config('app.name'))
                    ->description('Request Documents...')
                    ->url(route('documents'))
                    ->author(Schema::organization()->name(config('app.name')))
            );

        return view('livewire.documents');
    }

}
