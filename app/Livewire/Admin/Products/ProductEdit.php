<?php

namespace App\Livewire\Admin\Products;

use App\Models\Family;
use Livewire\Component;

class ProductEdit extends Component
{
    public $product;

    public $productEdit;

    public $families;
    public $family_id = '';
    public $category_id = '';

    public function mount($product)
    {
        $this->productEdit = $product->only('sku', 'name', 'description', 'image_path', 'price', 'subcategory_id');
        $this->families = Family::all();
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
