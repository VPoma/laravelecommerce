<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
        [
        'name' => $family->name,
    ]
]">

 <div class="card">

        <form action="{{route('admin.families.update', $family)}}" method="POST">

            @csrf

            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">
                    Nombre
                </label>
                <input type="text" id="first_name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" 
                    placeholder="Ingrese el nombre de la Familia" 
                    name="name" 
                    value="{{old('name', $family->name)}}"/>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-green">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</x-admin-layout>