<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Autorefresh extends Component
{
    public function render(): View
    {
        $dog = file_get_contents('https://random.dog/woof.json');
        $image = json_decode($dog, true)['url'];

        return view('livewire.autorefresh', compact('image'));
    }
}
