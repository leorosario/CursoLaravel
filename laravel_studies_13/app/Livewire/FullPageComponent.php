<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class FullPageComponent extends Component
{
    // #[Layout('components.layouts.new-layout')]
    #[Title('Full Page Component')]
    public function render()
    {
        // return view('livewire.full-page-component')->layout('components.layouts.new-layout');
        return view('livewire.full-page-component')->layout('components.layouts.new-layout');
    }
}
