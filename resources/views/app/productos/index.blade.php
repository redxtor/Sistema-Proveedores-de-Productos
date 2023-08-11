<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 110%; margin-left: -45px">
                <div class="container mx-auto mt-6">
                    <header class="mleft mb-4">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Productos') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("A continuación, se muestran todos los productos agregados al sistema. Puede realizar la búsqueda de algún producto por cualquiera de sus categorías.") }}
                        </p>
                    </header>

                    <form>
                        <div class="flex flex-row mleft mright mb-4 mt-6 space-y-6">
                            <div class="w600">
                                <x-input-label for="search" :value="__('Buscar')" />
                                <x-text-input id="search" name="search" type="text" class="mt-1 block w-full" :value="old('search', $search)" required autofocus autocomplete="search" />
                                <x-input-error class="mt-2" :messages="$errors->get('search')" />
                            </div>
                            <div class="mt-6 mleft mright">
                                <x-primary-button style="height: 42px">{{ __('Buscar') }}</x-primary-button>
                            </div>
                            <div class="mt-6 mright">
                                <x-nav-link-button href="{{ route('productos.index') }}" class="btn btn-light" style="height: 42px">
                                    Limpiar Búsqueda
                                </x-nav-link-button>
                            </div>
                            
                            <div class="mt-6">
                                <x-nav-link-button href="{{ route('productos.create') }}" class="btn btn-light" style="height: 42px; margin-left: 260px;">
                                        <i class="icon ion-md-return-left text-primary"></i>
                                        @lang('Agregar Producto')
                                </x-nav-link-button>
                            </div>
                        </div>
                    </form>
                </div>              

                <div class="pt-2"> 
                    <table class="table-auto table-borderless table-hover" aria-label="Catálogo de Productos">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Folio
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Unidad
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio por Unidad
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de Ingreso
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Proveedor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Región
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                            <tr>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->nombre }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->folio }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->cantidad }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->unidad }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->precio_por_unidad }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $producto->fecha_ingreso}}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    @php $proveedor = \App\Models\Proveedor::where(['id' => $producto->id_proveedor])->first(); @endphp
                                    {{ $proveedor->nombre}}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    @php $region = \App\Models\Region::where(['id' => $proveedor->id_region])->first(); @endphp
                                    {{ $region->region}}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    <div role="group" aria-label="Row Actions" class="flex gap-4">
                                        <x-nav-link-button href="/editar-producto/{{ $producto->id }}" class="btn btn-light">
                                            Editar
                                        </x-nav-link-button>
                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                            onsubmit="return confirm('{{ __('¿Estás seguro de que desea eliminar el producto?') }}')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $producto->id }}">
                                            <x-danger-button class="ml-3">
                                                {{ __('Eliminar') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr >
                                <td colspan="1">
                                    No Existen Registros
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot >
                            <tr>
                                <td class="px-2 py-2 text-white" colspan="7">{!! $productos->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .xborder {
        box-sizing: border-box;
        border-width: 1px;
        border-style: solid;
        border-color: #0e5653;
    }
    
    .mleft {
        margin-left: 20px;
    }

    .mright {
        margin-right: 20px;
    }

    .w600 {
        width: 600px;
    }
</style>