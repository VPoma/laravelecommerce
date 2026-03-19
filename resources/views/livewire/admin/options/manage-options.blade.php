<div>

    <section class="rounded-lg bg-white shadow-lg">

        <header class="border-b border-gray-200 px-6 py-2">
            
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">
                Opciones de producto
                </h1>

                <button wire:click="$set('openModal', true)" class="btn btn-blue ml-2">
                    Nueva Opción
                </button>
                
            </div>
            
        </header>

        <div class="p-6">

            <div class="space-y-6">

                @foreach ($options as $option)
                    
                    <div class="p-6 rounded-lg border border-gray-200 relative">
                        
                        <div class="absolute -top-3 px-4 bg-white">
                            <span>
                                {{ $option->name }}
                            </span>
                        </div>

                        {{--Valores--}}
                        <div class="flex flex-wrap">

                            @foreach ($option->features as $feature)

                                @switch($option->type)
                                    @case(1)

                                        {{-- texto --}}
                                        <span class="bg-neutral-primary-soft border border-default text-heading text-xs font-medium px-1.5 py-0.5 rounded">
                                            {{ $feature->description }}
                                        </span>
                                        
                                        @break
                                    @case(2)

                                        {{-- color --}}
                                        <span class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-300 mr-4" style="background-color: {{ $feature->description }};"></span>
                                        
                                        @break
                                    @default
                                        
                                @endswitch
                                
                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Crear nueva opción
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-label class="mb-1">
                        Nombre de la Opción
                    </x-label>
                    <x-input class="w-full" placeholder="Por ejemplo: Tamaño, Color, Etc"/>
                </div>

                <div>
                    <x-label class="mb-1">
                        Tipo de opción
                    </x-label>
                    <x-select wire:model.defer="type" class="w-full">
                        <option value="" disabled>Seleccione un tipo</option>
                        <option value="1">Texto</option>
                        <option value="2">Color</option>
                    </x-select>
                </div>
            </div>

            <div class="flex items-center mb-4">
                <hr class="flex-1">
                <span class="mx-4">
                    Valores
                </span>
                <hr class="flex-1">
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save">
                Guardar
            </x-button>

        </x-slot>

    </x-dialog-modal>

</div>
