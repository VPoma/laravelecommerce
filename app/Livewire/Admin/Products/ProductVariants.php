<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;

class ProductVariants extends Component
{
    public array $variant = [
        'option_id' => '',
        'feature' => [],
    ];

    public function render()
    {
        return view('livewire.admin.products.product-variants');
    }
}
