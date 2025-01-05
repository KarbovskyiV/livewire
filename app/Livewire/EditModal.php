<?php

namespace App\Livewire;

use App\Models\ParentProduct;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EditModal extends Component
{
    #[Locked]
    public int $id;
    public string $name = '';
    public string $price = '';
    public bool $showModal = false;

    public function edit(string $productId): void
    {
        $product = ParentProduct::query()->find($productId);
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->showModal = true;
    }
    
    public function render(): View
    {
        return view('livewire.edit-modal', [
            'products' => ParentProduct::all()
        ]);
    }
}
