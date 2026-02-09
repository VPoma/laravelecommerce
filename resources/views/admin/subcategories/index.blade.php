<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorías',
    ],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.subcategories.create') }}">
            Nuevo
        </a>
    </x-slot>

   

</x-admin-layout>
