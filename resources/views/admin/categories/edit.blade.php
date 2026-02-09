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
        'name' => $category->name,
    ],
]">

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label for="" class="block mb-2.5 text-sm font-medium text-heading">
                    Familia
                </label>
                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}"
                            @selected(old('family_id', $category->family_id) == $family->id)>
                            {{ $family->name }} 
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">
                    Nombre
                </label>
                <input type="text" id="first_name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Ingrese el nombre de la Categoria" name="name" value="{{old('name', $category->name)}}"/>
            </div>
            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
                
                <button type="submit" class="btn btn-green ml-2">
                    Actualizar
                </button>
            </div>
        </div>
        
    </form>

    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" id="delete-form">

        @csrf

        @method('DELETE')

    </form>

    @push('js')
        <script>
            function confirmDelete() {

                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, bórralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                    /*  Swal.fire({
                            title: "¡Eliminado!",
                            text: "Su archivo ha sido eliminado.",
                            icon: "success"
                        }); */
                        document.getElementById('delete-form').submit();
                    }
                });

            }
        </script>
    @endpush

</x-admin-layout>
