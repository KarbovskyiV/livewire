<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductsEdit extends Component
{
    #[Locked]
    public int $productId;
    #[Validate('required|min:3')]
    public string $name = '';
    #[Validate('required|min:3')]
    public string $description = '';
    #[Validate('required|exists:categories,id', as: 'category')]
    public int $category_id;
    public Collection $categories;

    public function mount(Product $product): void
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->categories = Category::query()->pluck('name', 'id');
    }

    public function render(): View
    {
        return view('livewire.products-edit');
    }

    public function save(): void
    {
        $this->validate();

        Product::query()->where('id', $this->productId)->update($this->only(['name', 'description', 'category_id']));

        $this->redirect('/products');
    }
}
