<?php

namespace App\Models;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['id', 'nombre', 'folio', 'cantidad', 'unidad', 'precio_por_unidad', 'fecha_ingreso', 'id_proveedor'];
    protected $searchableFields = ['*'];
}
