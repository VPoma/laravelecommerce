<div class="card">
    
    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Código
        </label>

        <input type="text" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            wire:model="product.sku"
            placeholder="Ingrese el código del producto"
            />
    </div>

    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Nombre
        </label>

        <input type="text" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            wire:model="product.name"
            placeholder="Ingrese el nombre del producto"
            />
    </div>
    
    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Descripción
        </label>

        <textarea class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            wire:model="product.description"
            placeholder="Ingrese la descripción del producto">
        </textarea>
    </div>

    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Familias
        </label>

        <x-select class="w-full" wire:model.live="family_id">

            <option value="" disabled>
                Seleccione una familia
            </option>

            @foreach ($families as $family)
                <option value="{{ $family->id }}">
                    {{ $family->name }}
                </option>
            @endforeach
        </x-select>
    </div>

    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Categorías
        </label>

        <x-select class="w-full" wire:model.live="category_id">

            <option value="" disabled>
                Seleccione una categoría
            </option>

            @foreach ($this->categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </x-select>
    </div>

    <div class="mb-4">
        <label for="" class="block mb-2.5 text-sm font-medium text-heading">
            Subcategorías
        </label>

        <x-select class="w-full" wire:model.live="product.subcategory_id">

            <option value="" disabled>
                Seleccione una subcategoría
            </option>

            @foreach ($this->subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </x-select>
    </div>

</div>
