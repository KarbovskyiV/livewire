<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{
    use WithFileUploads;

    public ProductsForm $form;
    public Collection $categories;

    public function mount(Product $product): void
    {
        $this->form->setProduct($product);

        $this->categories = Category::query()->pluck('name', 'id');
    }

    public function render(): View
    {
        return view('livewire.products-create');
    }

    public function save(): void
    {
        $this->form->update();

        $this->redirect('/products');
    }
}
