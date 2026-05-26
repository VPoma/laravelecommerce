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

            @if ($product->options->count())

                <div class="space-y-6">

                    @foreach ($product->options as $option)
                        <div wire:key="product-option-{{ $option->id }}"
                            class="p-6 rounded-lg border border-gray-200 relative">

                            <div class="absolute -top-3 px-4 bg-white">
                                <button onclick="confirmDeleteOption({{ $option->id }})">
                                    <i class="fa-solid fa-trash-can text-red-500 hover:text-red-600"></i>
                                </button>

                                <span class="ml-2">
                                    {{ $option->name }}
                                </span>
                            </div>

                            {{-- Valores --}}
                            <div class="flex flex-wrap">

                                @foreach ($option->pivot->features as $feature)
                                    @switch($option->type)
                                        @case(1)
                                            {{-- texto --}}
                                            <span
                                                class="bg-neutral-primary-soft border border-default text-heading text-xs font-medium me-2 pl-2.5 pr-1.5 py-0.5 rounded">
                                                {{ $feature['description'] }}

                                                <button class="ml-0.5" {{-- wire:click="deleteFeature({{ $feature->id }})" --}}
                                                    onclick="confirmDeleteFeature({{ $option->id }}, {{ $feature['id'] }}, 'feature')">
                                                    <i class="fa-solid fa-xmark hover:text-red-500"></i>
                                                </button>

                                            </span>
                                        @break

                                        @case(2)

                                            {{-- color --}}
                                            <div class="relative inline-block">
                                                <span
                                                    class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-300 mr-4"
                                                    style="background-color: {{ $feature['value'] }};"></span>

                                                <button type="button"
                                                    class="absolute z-10 left-3 -top-2 rounded-full bg-red-500 hover:bg-red-600 h-4 w-4 flex justify-center items-center"
                                                    onclick="confirmDeleteFeature({{ $option->id }}, {{ $feature['id'] }}); return false;">
                                                    <i class="fa-solid fa-xmark text-white text-xs"></i>
                                                </button>
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="flex items-start sm:items-center p-4 mb-4 text-sm text-fg-brand-strong rounded-base bg-brand-softer"
                    role="alert">
                    <svg class="w-4 h-4 me-2 shrink-0 mt-0.5 sm:mt-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p><span class="font-medium me-1">Info alert!</span> Change a few things up and try submitting
                        again.</p>
                </div>
            @endif


        </div>

    </section>

    <x-dialog-modal wire:model="openModal">

        <x-slot name="title">
            Agregar Nueva Opción
        </x-slot>

        <x-slot name="content">

            <x-validation-errors class="mb-4" />

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

                            <x-select class="w-full" wire:model.live="variant.features.{{ $index }}.id"
                                wire:change="feature_change( {{ $index }} )">

                                <option value="" disabled>
                                    Seleccione Un Valor
                                </option>

                                @foreach ($this->features as $feature)
                                    <option value="{{ $feature->id }}">
                                        {{ $feature->description }}
                                    </option>
                                @endforeach
                            </x-select>

                            <!--   <x-input class="w-full" wire:model="variant.features.{{ $index }}.value" /> -->
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

            <x-danger-button wire:click="$set('openModal', false)">
                Cancelar
            </x-danger-button>

            <x-button class="ml-2" wire:click="save">
                Guardar
            </x-button>

        </x-slot>

    </x-dialog-modal>

    @push('js')
        <script>
            function confirmDeleteFeature(option_id, feature_id) {

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

                        @this.call('deleteFeature', option_id, feature_id);
                    }
                });

            }

            function confirmDeleteOption(option_id) {

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

                        @this.call('deleteOption', option_id);
                    }
                });

            }
        </script>
    @endpush

</div>
