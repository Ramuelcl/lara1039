<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tabla extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tablas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tabla',
        'tabla_id',
        'nombre',
        'descripcion',
        'activo',
        'valor1',
        'valor2',
        'valor3',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tabla' => 'integer',
        'tabla_id' => 'integer',
        'activo' => 'boolean',
        'valor1' => 'decimal:2',
        'valor3' => 'boolean',
    ];

    // para retornar el menu y sub-menu
    public function parent()
    {
        return $this->belongsTo(
            $related = 'App\Models\Backend\tablas',
            $foreignKey = 'parent_id',
            $ownerKey = "",
            $relation = 'tabla=1000'
        );
    }

    public function children()
    {
        return $this->hasMany('App\Models\Backend\tablas', 'parent_id');
    }
}
