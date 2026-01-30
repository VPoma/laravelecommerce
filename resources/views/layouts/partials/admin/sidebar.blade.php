@php
    $links = [
        [
            //'label' => 'Dashboard',
            //Dashboard Principal
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge-high',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            // Familia de Productos
            'name' => 'Familias',
            'icon' => 'fa-solid fa-box-open',
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*'),
        ]
    ];
    //class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
@endphp

<aside id="top-bar-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] transition-transform sm:translate-x-0"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white border-r border-default">
        <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3" alt="Flowbite Logo" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">Flowbite</span>
        </a>
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600 group {{ $link['active'] ? 'bg-gray-100' : '' }}">

                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $link['icon'] }} text-gray-500"></i>
                        </span>

                        <span class="ms-2">
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
