<?php

namespace App\Livewire;

use App\Models\Request; // Ensure this is the correct namespace for your model
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\SchemaOrg\Schema;

class Documents extends Component
{
    use WithFileUploads;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $sufix;
    public $birth_date;
    public $contact_number;
    public $email;
    public $requestType;
    public $valid_id;
    public $accept_terms;

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

        if($request->save()) {
            session()->flash('message', 'Request submitted successfully!');
            $this->reset();
        }

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
