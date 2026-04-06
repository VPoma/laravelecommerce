<div>

    <section class="rounded-lg bg-white shadow-lg">

        <header class="border-b border-gray-200 px-6 py-2">
            
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">
                Opciones de producto
                </h1>

                <button wire:click="$set('newOption.openModal', true)" class="btn btn-blue ml-2">
                    Nueva Opción
                </button>
                
            </div>
            
        </header>

        <div class="p-6">

            <div class="space-y-6">

                @foreach ($options as $option)
                    
                    <div class="p-6 rounded-lg border border-gray-200 relative" wire:key="option-{{ $option->id }}">
                        
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
                                        <span class="bg-neutral-primary-soft border border-default text-heading text-xs font-medium me-2 pl-2.5 pr-1.5 py-0.5 rounded">
                                            {{ $feature->description }}

                                            <button class="ml-0.5" 
                                                {{-- wire:click="deleteFeature({{ $feature->id }})" --}}
                                                onclick="confirmDelete({{ $feature->id }})">
                                                <i class="fa-solid fa-xmark hover:text-red-500"></i>
                                            </button>

                                        </span>
                                        
                                        @break
                                    @case(2)

                                        {{-- color --}}
                                        <div class="relative">
                                            <span class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-300 mr-4" style="background-color: {{ $feature->description }};"></span>
                                            
                                            <button class="absolute z-10 left-3  -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex  justify-center items-center" 
                                            onclick="confirmDelete({{ $feature->id }})">
                                                <i class="fa-solid fa-xmark text-white text-xs"></i>
                                            </button>

                                        </div>

                                        @break
                                    @default
                                        
                                @endswitch
                                
                            @endforeach

                        </div>

                        <div>
                            @livewire('admin.options.add-new-feature', ['option' => $option], key('add-new-feature-' . $option->id))
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    <x-dialog-modal wire:model="newOption.openModal">
        <x-slot name="title">
            Crear nueva opción
        </x-slot>

        <x-slot name="content">

            <x-validation-errors class="mb-4"  />

            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-label class="mb-1">
                        Nombre de la Opción
                    </x-label>
                    <x-input wire:model="newOption.name" class="w-full" placeholder="Por ejemplo: Tamaño, Color, Etc"/>
                </div>

                <div>
                    <x-label class="mb-1">
                        Tipo de opción
                    </x-label>
                    <x-select wire:model.live="newOption.type" class="w-full">

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
            
            <div class="mb-4 space-y-4">
                @foreach ($newOption->features as $index => $feature)

                    <div class="p-6 rounded-lg border border-gray-200 relative" wire:key="features-{{ $index }}">

                        <div class="absolute -top-3 px-4 bg-gray-600">
                            <button wire:click="removeFeature({{ $index }})">
                                <i class="fas fa-trash-can text-gray-100 hover:text-red-600"></i>
                            </button>
                        </div>

                        <div class="grid grid-cols-2 gap-6">

                            <div>
                                <x-label class="mb-1">
                                    valor
                                </x-label>

                                @switch($newOption->type)
                                    @case(1)
                                        <x-input wire:model="newOption.features.{{ $index }}.value" class="w-full" placeholder="Ingrese el valor de la opción"/>
                                        @break
                                    @case(2)
                                    <div class="border border-gray-300 rounded-md h-[42px] flex items-center justify-between px-3">
                                        {{ $newOption->features[$index]['value'] ?: "Seleccionar color" }}
                                        <input type="color" wire:model.live="newOption.features.{{ $index }}.value">
                                    </div>
                                        @break
                                    @default
                                        
                                @endswitch
                            </div>

                            <div>
                                <x-label class="mb-1">
                                    Descripción
                                </x-label>
                                <x-input wire:model="newOption.features.{{ $index }}.description" class="w-full" placeholder="Ingrese la descripción de la opción"/>
                            </div>
                        </div>

                    </div>
                    
                @endforeach
            </div>

            <div class="flex justify-end">
                <x-button wire:click="addFeature" class="me-2">
                    Añadir valor
                </x-button>
            </div>

        </x-slot>

        <x-slot name="footer">

            <button class="btn btn-blue" wire:click="addOption">
                Agregar
            </button>

        </x-slot>

    </x-dialog-modal>

</div>

 @push('js')
        <script>
            function confirmDelete(featureId) {

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

                        @this.call('deleteFeature', featureId);
                    }
                });

            }
        </script>
    @endpush
