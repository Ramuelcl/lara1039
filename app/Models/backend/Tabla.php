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
    protected $fillable = ['tab_tabla', 'tab_id', 'tab_nombre', 'tab_descripcion', 'is_active', 'tab_tipoValor', 'tab_valor1', 'tab_valor2'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tab_tabla' => 'integer',
        'tab_id' => 'integer',
        'is_active' => 'boolean',
        'tab_tipoValor' => 'string',
        'tab_valor1' => 'string',
        'tab_valor2' => 'string',
    ];

    // para retornar el menu y sub-menu
    public function parent()
    {
        return $this->belongsTo($related = 'App\Models\Backend\tablas', $foreignKey = 'parent_id', $ownerKey = '', $relation = 'tabla=1000');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Backend\tablas', 'parent_id');
    }
}
