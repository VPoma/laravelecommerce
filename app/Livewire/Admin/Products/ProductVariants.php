<?php

namespace App\Livewire\Admin\Products;

use App\Models\Feature;
use App\Models\Option;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ProductVariants extends Component
{
    public $openModal = true;

    public $options;

    public $variant = [
        'option_id' => '',
        'features' => [
            [
                'id' => '',
                'value' => '',
                'descripcion' => '',
            ],
        ],
    ];

    public function mount()
    {
        $this->options = Option::all();
    }

    #[Computed()]
    public function features()
    {
        return Feature::where('option_id', $this->variant['option_id'])->get();
        
    }

    public function render()
    {
        return view('livewire.admin.products.product-variants');
    }
}
