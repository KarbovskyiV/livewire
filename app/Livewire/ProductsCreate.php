<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class ProductsCreate extends Component
{
    public string $name = '';
    public string $description = '';
    public int $category_id;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::query()->pluck('name', 'id');
    }

    public function save(): void
    {
        Product::query()->create($this->only(['name', 'description', 'category_id']));

        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('livewire.products-create');
    }
}
