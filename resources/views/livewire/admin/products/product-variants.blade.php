<div>
    <section class="rounded-lg border border-gray-100 bg-white shadow-lg">
        
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

        </div>

    </section>

    <x-dialog-modal wire:model="openModal">

        <x-slot name="title">
            Agregar Nueva Opción
        </x-slot>

        <x-slot name="content">
            
            <div class="mb-4">

                <x-label class="mb-1">
                    Opción
                </x-label>

                <x-select class="w-full" wire:model.live="variant.option_id">

                    <option value="" disabled>
                        Seleccione Una Opción
                    </option>

                    @foreach ($options as $option)

                        <option value="{{ $option->id }}">
                            {{ $option->name }}
                        </option>

                    @endforeach

                </x-select>

            </div>

            <div class="flex items-center mb-6">

                <hr class="flex-1">
                
                <span class="mx-4">
                    Valores
                </span>

                <hr class="flex-1">

            </div>

            <ul class="mb-4 space-y-4">

                @foreach ($variant['features'] as $index => $feature)
                
                    <li wire:key="variante-feature-{{ $index }}"
                        class="relative border border-gray-200 rounded-lg p-6">
                        
                        <div class="absolute -top-3 bg-white px-4">

                            <button wire:click="removeFeature( {{ $index }} )">
                                <i class="fa-solid fa-trash-can text-red-500 hover:text-red-600"></i>
                            </button>

                        </div>

                        <div>
                            <x-label class="mb-1">
                                Valores
                            </x-label>

                            <x-select class="w-full">

                                <option value="" disabled>
                                    Seleccione Un Valor
                                </option>

                                @foreach ($this->features as $feature)
                                
                                    <option value="{{ $feature->id }}">
                                        {{ $feature->description }}
                                    </option>

                                @endforeach
                            </x-select>

                            <x-input class="w-full" wire:model="variant.features.{{ $index }}.value" />
                        </div>

                    </li>
                    
                @endforeach

            </ul>

            <div class="flex justify-end">

                <x-button wire:click="addFeature">
                    Agregar Valor
                </x-button>

            </div>

        </x-slot>

        <x-slot name="footer">
            
        </x-slot>

    </x-dialog-modal>

</div>
