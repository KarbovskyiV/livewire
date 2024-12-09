<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductsForm extends Form
{
    public ?Product $product;
    #[Validate('required|min:3')]
    public string $name = '';
    #[Validate('required|min:3')]
    public string $description = '';
    #[Validate('required|exists:categories,id', as: 'category')]
    public int $category_id;

    public function setProduct(Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
    }

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->validate();

        Product::query()->create($this->all());
    }

    /**
     * @throws ValidationException
     */
    public function update(): void
    {
        $this->validate();

        $this->product->update($this->all());
    }
}