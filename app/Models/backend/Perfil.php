<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Tabla;

use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perfiles';
    protected $tabla = 10100;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'edad', 'profesion_id', 'biografia', 'website'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'edad' => 'integer',
        'id_profesion' => 'integer',
    ];

    // public function user()
    // {
    //     return $this->hasOne(\App\Models\User::class);
    // }

    // relacion 1:1 inversa
    public function r_user()
    {
        // $user = User::find( $this->user_id);
        // return $user;

        // otra opcion
        // return $this->belongsTo('App\Models\User', 'foreign_key', 'local_key');

        // la que más se utiliza
        return $this->belongsTo(\App\Models\User::class);
    }
    public function profesion_id($id = null)
    {
        if ($id !== null) {
            $profesion = Tabla::find()
                ->where('tabla', $this->tabla)
                // ->where('activo', true)
                ->where('id', $id)
                ->limit(1)
                ->get();
            return $profesion;
        } else {
            return 'debe indicar ID de Profesión';
        }
    }
    public function profesion_rnd()
    {
        $paso = Tabla::orderByRaw('RAND()')
            ->where('tab_tabla', $this->tabla)
            ->where('is_active', true)
            ->limit(1)
            ->pluck('tab_id');
        // dd($paso);
        return $paso;
    }
}
