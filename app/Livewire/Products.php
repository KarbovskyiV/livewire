<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public function render(): View
    {
        return view('livewire.products', [
            'products' => Product::query()->paginate(10),
        ]);
    }
}