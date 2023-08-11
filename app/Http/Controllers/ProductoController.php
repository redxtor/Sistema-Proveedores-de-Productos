<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Region;
use App\Models\Proveedor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $productos = Producto::search($search) // Llamar a un scope "search" en el modelo Producto
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.productos.index', compact('productos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $search = $request->get('search', '');
        //dd($search);
        $proveedores = DB::table('proveedors')
            ->where('RFC', $search)
            ->get();

        $existProv = 0;
        if(count($proveedores) > 0) {
            $existProv = 1;
        }

        return view('app.productos.create', compact('proveedores', 'search', 'existProv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        $this->authorize('create', Producto::class);

        $validated = $request->validated();
        Producto::create($validated);

        return redirect()->action(
            [ProductoController::class, 'index']
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Producto $producto, Request $request)
    {   
        $search = $request->get('search', '');
        //dd($search);
        $proveedores = DB::table('proveedors')
            ->where('RFC', $search)
            ->get();        
        $existProv = 0;
        if(count($proveedores) > 0) {
            $existProv = 1;
        }

        $product = DB::select('select * from productos where id = ?', [$id]);
        $prov = DB::select('select * from proveedors where id = ?', [$product[0]->id_proveedor]);

        return view('app.productos.edit', compact('product', 'producto', 'proveedores', 'search', 'existProv', 'prov'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, UpdateProductoRequest $request, Producto $producto)
    {
        $this->authorize('update', $producto);
        $validated = $request->validated();

        $prod = Producto::find($req->id);
        $prod->update($validated);

        return redirect()->action(
            [ProductoController::class, 'index']
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Producto $producto)
    {
        $this->authorize('delete', $producto);
        $prod = Producto::find($request->id);
        $prod->delete();

        return redirect()->action(
            [ProductoController::class, 'index']
        );
    }
}
