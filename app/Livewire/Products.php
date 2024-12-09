<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public Collection $categories;
    public string $searchQuery = '';
    public int $searchCategory = 0;

    public function mount(): void
    {
        $this->categories = Category::query()->pluck('name', 'id');
    }

    public function render(): View
    {
        $products = Product::with('categories')
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory))
            ->when($this->searchCategory > 0, function (Builder $query) {
                $query->whereHas('categories', function (Builder $query2) {
                    $query2->where('id', $this->searchCategory);
                });
            })
            ->paginate(10);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }

    public function updating(string $key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory') {
            $this->resetPage();
        }
    }

    public function deleteProduct(int $productId): void
    {
        Product::query()->where('id', $productId)->delete();
    }
}
