<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Products extends Component
{
    public function render(): View
    {
        return view('livewire.products', [
            'products' => Product::all(),
        ]);
    }
}
