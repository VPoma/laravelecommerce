<?php

namespace App\Livewire\Admin\Subcategories;

use Livewire\Component;
use App\Models\Family;

class SubcategoryCreate extends Component
{
    public $families;

    public $subcategory = [
        'family_id' => '',
        'category_id' => '',
        'name' => ''
    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-create');
    }
}
