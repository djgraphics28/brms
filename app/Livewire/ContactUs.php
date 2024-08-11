<?php

namespace App\Livewire;

use App\Models\Concern;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsAutoResponderMail;

class ContactUs extends Component
{
    use LivewireAlert;
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Concern::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Send the email
        Mail::to('djethrox01@gmail.com')->send(new ContactUsMail($this->name, $this->email, $this->message));

        Mail::to($this->email)->send(new ContactUsAutoResponderMail($this->name));

        // Reset form fields
        $this->reset(['name', 'email', 'message']);

        // Show success message
        $this->alert('success', 'Your message has been sent successfully.');
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
