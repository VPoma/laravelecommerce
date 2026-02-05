<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="mb-4">
                <label for="" class="block mb-2.5 text-sm font-medium text-heading">
                    Familia
                </label>
                <select name="family_id">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">
                            {{ $family->name }} 
                        </option>
                    @endforeach
                </select>
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
