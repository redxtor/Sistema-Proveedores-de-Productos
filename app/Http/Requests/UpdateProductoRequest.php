<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'folio' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'unidad' => 'required|string',
            'precio_por_unidad' => 'required|numeric|min:0.01',
            'fecha_ingreso' => 'required|date',
            'id_proveedor' => 'required|exists:proveedors,id'
        ];
    }
}
