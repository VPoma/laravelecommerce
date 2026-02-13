<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorías',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <form action="{{ route('admin.subcategories.store') }}" method="POST">
        @csrf

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label for="" class="block mb-2.5 text-sm font-medium text-heading">
                    Categorías
                </label>
                <x-select name="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }} 
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">
                    Nombre
                </label>
                <input type="text" id="first_name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Ingrese el nombre de la Categoria" name="name" value="{{old('name')}}"/>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn btn-green">
                    Guardar
                </button>
            </div>
        </div>
        
    </form>

</x-admin-layout>
