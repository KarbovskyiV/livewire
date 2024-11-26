<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowHelp extends Component
{
    public bool $showHelp = false;

    public function render(): View
    {
        return view('livewire.show-help');
    }
}
