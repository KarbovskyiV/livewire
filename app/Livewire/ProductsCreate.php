<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class ProductsCreate extends Component
{
    #[Validate('required|min:3')]
    public string $name = '';
    #[Validate('required|min:3')]
    public string $description = '';
    #[Validate('required|exists:categories,id', as: 'category')]
    public int $category_id;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::query()->pluck('name', 'id');
    }

    public function save(): void
    {
        $this->validate();

        Product::query()->create($this->only(['name', 'description', 'category_id']));

        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('livewire.products-create');
    }
}
