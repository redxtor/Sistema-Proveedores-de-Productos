<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Agregar Producto') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Para agregar un producto al sistema, solo complete todos los campos que se indican a continuación.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('productos.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="nombre" :value="__('Nombre del Producto')" />
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
                        </div>

                        <div>
                            <x-input-label for="folio" :value="__('Folio')" />
                            <x-text-input id="folio" name="folio" type="text" class="mt-1 block w-full" :value="old('folio', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('folio')" />
                        </div>

                        <div>
                            <x-input-label for="cantidad" :value="__('Cantidad')" />
                            <x-text-input id="cantidad" name="cantidad" type="text" class="mt-1 block w-full" :value="old('cantidad', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('cantidad')" />
                        </div>

                        <div>
                            <x-input-label for="unidad" :value="__('Unidad de Medición')" />
                            <x-text-input id="unidad" name="unidad" type="text" class="mt-1 block w-full" :value="old('unidad', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('unidad')" />
                        </div>

                        <div>
                            <x-input-label for="precio_por_unidad" :value="__('Precio por Unidad')" />
                            <x-text-input id="precio_por_unidad" name="precio_por_unidad" type="text" class="mt-1 block w-full" :value="old('precio_por_unidad', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('precio_por_unidad')" />
                        </div>

                        <div>
                            <x-input-label for="fecha_ingreso" :value="__('Fecha de Ingreso')" />
                            <x-text-input id="fecha_ingreso" name="fecha_ingreso" type="date" class="mt-1 block w-full" :value="old('fecha_ingreso', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('fecha_ingreso')" />
                        </div>

                        <div>
                            <x-input-label for="id_proveedor" :value="__('Nombre del Proveedor')" />
                            <x-text-input id="id_proveedor" name="id_proveedor" type="text" class="mt-1 block w-full" :value="old('id_proveedor', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('id_proveedor')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('productos.index') }}" class="btn btn-light">
                                <i class="icon ion-md-return-left text-primary"></i>
                                @lang('crud.common.back')
                            </a>

                            <button type="submit" class="btn btn-primary float-right">
                                <i class="icon ion-md-save"></i>
                                @lang('crud.common.create')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>