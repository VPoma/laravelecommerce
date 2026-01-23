<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
    ],
]">
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-lg shadow-lg p-6">

            <div class="flex items-center">
                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                
                <div class="ml-4 flex-1">
                    <h2 class="text-lg font-semibold">
                        BIenvenido: {{ auth()->user()->name}}
                    </h2>
                    <form action="{{ route('logout') }}" method="POST"></form>
                    @csrf
                    <button class="text-sm hover:text-blue-500">
                        Cerrar Sesión
                    </button>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-center">
            
            <h2 class="text-lg font-semibold">
                Prueba Corp
            </h2>
        </div>

    </div>

</x-admin-layout>