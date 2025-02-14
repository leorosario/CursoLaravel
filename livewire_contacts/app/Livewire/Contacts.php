<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;

class Contacts extends Component
{
    public $contacts;

    public function mount()
    {
        $this->updateContacts();
    }

    #[On('contactAdded')]
    public function updateContactList()
    {
        $this->updateContacts();
    }

    private function updateContacts(){
        $this->contacts = Contact::all();
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
