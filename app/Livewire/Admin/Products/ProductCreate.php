<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Family;
use App\Models\Subcategory;

class ProductCreate extends Component
{

    public $families;
    public $family_id = '';
    public $category_id = '';
    
    public $product = [
        'sku' => '',
        'name' => '',
        'description' => '',
        'image_path' => '',
        'price' => '',
        'subcategory_id' => ''
    ];

    public function mount(){
        $this->families = Family::all();
    }

    public function updatedFamilyId($value){
        $this->category_id = '';
        $this->product['subcategory_id'] = '';
    }

    public function updatedCategoryId($value){
        $this->product['subcategory_id'] = '';
    }

    #Propiedad computada para traer las categorias de la familia seleccionada
    #[Computed()]
    public function categories(){
        return Category::where('family_id', $this->family_id)->get();
    }

    #Propiedad computada para traer las subcategorias de la categoria seleccionada
    #[Computed()]
    public function subcategories(){
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
