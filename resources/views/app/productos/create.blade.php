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
                            {{ __("Para agregar un producto al sistema, solo complete todos los campos que se indican a continuación.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('productos.store') }}" class="mt-6 space-y-6 max-w-7xl">
                        @csrf

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

                        <div class="mb-4">
                            <label for="selectRegion" class="block text-sm font-medium text-gray-700">Selecciona una Región:</label>
                            <select id="selectRegion" name="selected_region" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Seleccione una región</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region }}">{{ $region }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div>
                            <x-inputs.group class="col-sm-12 col-lg-6">
                                <x-input-label for="selectRegion" :value="__('Region')" />
                                <x-inputs.select name="selected_region" label="" required id="selectRegion"> 
                                    @php $selected = old('regionID', '') @endphp
                                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Favor de seleccionar una Región</option>
                                    @foreach($regions as $value => $label)
                                        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                                    @endforeach
                                </x-inputs.select>
                            </x-inputs.group>
                        </div> -->

                        <div class="mb-4">
                            <label for="selectProveedor" class="block text-sm font-medium text-gray-700">Selecciona un Proveedor:</label>
                            <select id="selectProveedor" name="selected_proveedor" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                                <option value="">Primero selecciona una región</option>
                            </select>
                        </div>

                        <script>
                            const selectRegion = document.getElementById('selectRegion');
                            const selectProveedor = document.getElementById('selectProveedor');

                            selectRegion.addEventListener('change', () => {
                                const selectedRegionId = selectRegion.value;
                                if (selectedRegionId) {
                                    selectProveedor.disabled = false;
                                    selectProveedor.innerHTML = '<option value="">Seleccione un proveedor</option>';
                                    const proveedoresForRegion = @json($proveedors);
                                    proveedoresForRegion[selectedRegionId].forEach(proveedor => {
                                        const option = document.createElement('option');
                                        option.value = proveedor.id;
                                        option.textContent = proveedor.nombre;
                                        selectProveedor.appendChild(option);
                                    });
                                } else {
                                    selectProveedor.disabled = true;
                                    selectProveedor.innerHTML = '<option value="">Primero selecciona una región</option>';
                                }
                            });
                        </script>

                        <div>
                            <x-input-label for="id_proveedor" :value="__('Nombre del Proveedor')" />
                            <x-text-input id="id_proveedor" name="id_proveedor" type="text" class="mt-1 block w-full" :value="old('id_proveedor', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('id_proveedor')" />
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