<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_parent', 'name', 'url', 'icon', 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_parent' => 'integer',
               'is_active' => 'boolean',
        'name' => 'string',
        'url' => 'string',
        'icon' => 'string',
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
