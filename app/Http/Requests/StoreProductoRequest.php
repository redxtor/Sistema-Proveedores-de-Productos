<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'id' => ['required', 'exists:productos,id'],
            // 'nombre' => ['required', 'max:255', 'string'],
            // 'folio' => ['required', 'max:255', 'string'],
            // 'cantidad' => ['required', 'max:11', 'int'],
            // 'unidad' => ['required', 'max:255', 'string'],
            // 'precio_por_unidad' => ['required', 'max:255', 'string'],
            // 'fecha_ingreso' => ['required', 'exists:productos,id'],
            // 'id_proveedor' => ['required', 'exists:proveedors,id'],
            'nombre' => 'required|string|max:255',
            'folio' => 'required|numeric|unique:productos',
            'cantidad' => 'required|integer|min:1',
            'unidad' => 'required|string|in:pieza,litro,kilogramo',
            'precio_por_unidad' => 'required|numeric|min:0.01',
            'fecha_ingreso' => 'required|date',
            'id_proveedor' => 'required|exists:proveedors,id'
        ];
    }
}
