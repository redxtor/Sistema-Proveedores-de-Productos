<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catálogo de Proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form>
                    <div class="flex flex-row mt-0 mb-4 mt-6 space-y-6 max-w-7xl" style="margin-left: 20px;">
                        <div class="flex-auto" style="width: 600px">
                            <x-input-label for="search" :value="__('Buscar')" />
                            <x-text-input id="search" name="search" type="text" class="mt-1 block w-full" :value="old('search', $search)" required autofocus autocomplete="search" />
                            <x-input-error class="mt-2" :messages="$errors->get('search')" />
                        </div>
                        <div class="mt-1" style="margin-left: 20px;">
                            <x-primary-button style="height: 42px">{{ __('Buscar') }}</x-primary-button>
                        </div>
                    </div>
                </form>

                <div class="w-96 pt-2"> 
                    <table class="table-auto table-borderless table-hover" aria-label="Catálogo de Proveedores">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Razon Social
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Número Proveedor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha Registro
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    RFC
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Región
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Logotipo
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($proveedores as $proveedor)
                            <tr>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $proveedor->nombre }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $proveedor->razon_social }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $proveedor->numero_proveedor }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $proveedor->fecha_registro }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    {{ $proveedor->RFC }}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    @php $region = \App\Models\Region::where(['id' => $proveedor->id_region])->first(); @endphp
                                    {{ $region->region}}
                                </td>
                                <td class="px-6 py-4 text-white whitespace-nowrap">
                                    <img src="{{ $proveedor->imagen_random }}" alt="Logo" style="max-width: 50px">
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
                                <td class="px-2 py-2 text-white" colspan="7">{!! $proveedores->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>