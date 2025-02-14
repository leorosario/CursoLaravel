<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|min:5|max:50')]
    public $email;

    #[Validate('required|min:5|max:20')]
    public $phone;

    // error and success messages
    public $error = '';
    public $success = '';

    public function newContact()
    {
        // validation
        $this->validate();

        // store contact in database
        $result = Contact::firstOrCreate(
            [
                'name' => $this->name,
                'email' => $this->email
            ],
            [
                'phone' => $this->phone
            ]
        );        

        // check for success or error
        if($result->wasRecentlyCreated){            
            // clear form
            $this->reset();
            
            // success message
            $this->success = "Contact created successfully.";

            // create an event
            $this->dispatch("contactAdded");
        }else{
            // error message
            $this->error = "The contact already exists.";
        }
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
