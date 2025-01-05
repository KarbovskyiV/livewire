<?php

namespace App\Livewire;

use App\Models\ParentProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class ParentChildren extends Component
{
    public string $customer_name = '';
    public string $customer_email = '';

    public array $orderProducts = [];
    public Collection $allProducts;

    public function mount(): void
    {
        $this->allProducts = ParentProduct::all();
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function addProduct(): void
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct(int $key): void
    {
        unset($this->orderProducts[$key]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function render(): View
    {
        return view('livewire.parent-children');
    }
}
