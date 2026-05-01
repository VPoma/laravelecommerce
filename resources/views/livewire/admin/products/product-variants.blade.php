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

                <x-select class="w-full" wire:model="variant.option_id">

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

        </x-slot>

        <x-slot name="footer">
            
        </x-slot>

    </x-dialog-modal>

</div>
