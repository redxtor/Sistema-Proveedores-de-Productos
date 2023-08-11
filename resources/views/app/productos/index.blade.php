<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                            
                            <div class="mt-6">
                                <a href="{{ route('productos.create') }}" style="height: 42px; margin-left: 260px;" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    {{ __('Agregar Producto') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>              

                <div class="w-96 pt-2"> 
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