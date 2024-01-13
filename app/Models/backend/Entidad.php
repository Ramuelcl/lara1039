<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Entidades';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
    ];

    public function tablas(): BelongsTo
    {
        return $this->belongsTo(Tabla::class);
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class);
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */

    public function tabla()
    {
        return $this->morphTo(Tabla::class, 'tabla', 'tabla_id');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
