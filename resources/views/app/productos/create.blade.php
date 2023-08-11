<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Agregar Producto') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Para agregar un producto al sistema, primero busque al proveedor por RFC del producto. Utilice el campo de búsqueda para encontrar a su proveedor. Si este es encontrado, podrá completar todos los campos que se indican a continuación.") }}
                        </p>
                    </header>

                    <form>
                        <div class="flex flex-row mt-0 mb-4 mt-6 space-y-6 max-w-7xl">
                            <div class="flex-auto" style="width: 600px">
                                <x-input-label for="search" :value="__('Buscar Proveedor por RFC')" />
                                <x-text-input id="search" name="search" type="text" class="mt-1 block w-full" :value="old('search', $search)" required autofocus autocomplete="search" />
                                <x-input-error class="mt-2" :messages="$errors->get('search')" />
                            </div>
                            <div class="mt-1" style="margin-left: 20px;">
                                <x-primary-button style="height: 42px">{{ __('Buscar') }}</x-primary-button>
                            </div>
                            @if($existProv)
                                <div class="mt-2" style="margin-left: 33px; margin-top: 32px">
                                    Proveedor Encontrado: {{ $proveedores[0]->nombre }}
                                </div>
                            @else
                                <div class="mt-2" style="margin-left: 33px; margin-top: 32px">
                                    Proveedor No Encontrado
                                </div>
                            @endif
                        </div>
                    </form>

                    <form method="post" action="{{ route('productos.store') }}" class="mt-6 space-y-6 max-w-7xl">
                        @csrf
                        
                        @if($existProv)
                            <input type="hidden" name="id_proveedor" value="{{ $proveedores[0]->id }}">
                        @else
                            <div class="mt-2">
                                <b> Debe buscar al proveedor por su RFC para agregar un producto. </b>
                            </div>
                        @endif

                        <div>
                            <x-input-label for="nombre" :value="__('Nombre del Producto')" />
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
                        </div>  

                        <div class="flex gap-4">
                            <div class="w-50" style="min-width: 33.1%;">
                                <x-input-label for="folio" :value="__('Folio')" />
                                <x-text-input id="folio" name="folio" type="text" class="mt-1 block w-full" :value="old('folio', '')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('folio')" />
                            </div>
                            <div class="w-50" style="min-width: 32%">
                                <x-input-label for="cantidad" :value="__('Cantidad')" />
                                <x-text-input id="cantidad" name="cantidad" type="number" class="mt-1 block w-full" :value="old('cantidad', '')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('cantidad')" />
                            </div>
                            <div style="min-width: 32%">
                                <x-input-label for="unidad" :value="__('Unidad de Medición')" />
                                <x-input-error class="mt-2" :messages="$errors->get('unidad')" />
                                <x-inputs.select name="unidad" label="" class="mt-1" style="min-width: 100%">
                                    @php $selected = old('precio_por_unidad', '0') @endphp
                                    <option value="Pieza" {{ $selected == 'Pieza' ? 'selected' : '' }} >Pieza</option>
                                    <option value="Kilogramo" {{ $selected == 'Kilogramo' ? 'selected' : '' }} >Kilogramo</option>
                                    <option value="Gramo" {{ $selected == 'Gramo' ? 'selected' : '' }} >Gramo</option>
                                    <option value="Paquete" {{ $selected == 'Paquete' ? 'selected' : '' }} >Paquete</option>
                                    <option value="Litro" {{ $selected == 'Litro' ? 'selected' : '' }} >Litro</option>
                                    <option value="Mililitro" {{ $selected == 'Mililitro' ? 'selected' : '' }} >Mililitro</option>
                                    <option value="Metro" {{ $selected == 'Metro' ? 'selected' : '' }} >Metro</option>
                                    <option value="Centímetro" {{ $selected == 'Centímetro' ? 'selected' : '' }} >Centímetro</option>
                                    <option value="Onza" {{ $selected == 'Onza' ? 'selected' : '' }} >Onza</option>
                                    <option value="Libra" {{ $selected == 'Libra' ? 'selected' : '' }} >Libra</option>
                                    <option value="Caja" {{ $selected == 'Caja' ? 'selected' : '' }} >Caja</option>
                                    <option value="Unidad" {{ $selected == 'Unidad' ? 'selected' : '' }} >Unidad</option>
                                </x-inputs.select>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div style="min-width: 49%">
                                <x-input-label for="precio_por_unidad" :value="__('Precio por Unidad')" />
                                <x-text-input id="precio_por_unidad" name="precio_por_unidad" type="text" class="mt-1 block w-full" :value="old('precio_por_unidad', '')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('precio_por_unidad')" />
                            </div>

                            <div style="min-width: 49.5%">
                                <x-input-label for="fecha_ingreso" :value="__('Fecha de Ingreso')" />
                                <x-text-input id="fecha_ingreso" name="fecha_ingreso" type="date" class="mt-1 block w-full" :value="old('fecha_ingreso', '')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('fecha_ingreso')" />
                            </div>
                        </div>

                        <div class="flex justify-end gap-4">
                            <x-nav-link-button href="{{ route('productos.index') }}" class="btn btn-light">
                                    <i class="icon ion-md-return-left text-primary"></i>
                                    @lang('Regresar')
                            </x-nav-link-button>
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>