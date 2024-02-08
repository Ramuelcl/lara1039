<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// Spatie
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // The User model requires this trait
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'is_active', 'profile_photo_path'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_path'];

    /**mutators = mutadores */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function userSetting()
    {
        return $this->hasOne(UserSetting::class);
    }
    public function getProfilePhotoPathAttribute()
    {
        $name = $this->attributes['profile_photo_path'] ? $this->attributes['profile_photo_path'] : 'images/avatars/default.png';
        return $name;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    // public function Activo()
    // {
    //     return $this->where('is_active', true);
    // }
    // filtra por campo Role
    // public function scopeRole($query, $role)
    // {
    //     // dd(['role' => $role, 'query' => $query]);
    //     if (!empty($role)) {
    //         $paso = $query->whereHas('roles', function ($query) use ($role) {
    //             $query->where('name', $role);
    //         });
    //         dd(['role' => $role, 'paso' => $paso]);
    //         return $paso;
    //     }
    // }
    public function scopeRoles($query, $roles)
    {
        // Verifica si se proporcionaron roles
        if (!empty($roles) && is_array($roles)) {
            // Utiliza whereHas con orWhere para filtrar por múltiples roles
            return $query->where(function ($query) use ($roles) {
                foreach ($roles as $role) {
                    $query->orWhereHas('roles', function ($query) use ($role) {
                        $query->where('name', $role);
                    });
                }
            });
        }

        // Si no se proporcionaron roles, simplemente devuelve el query builder original
        return $query;
    }

    // otra opcion para los roles
    // public function scopeRoles($query, $roles)
    // {
    //     // Verifica si se proporcionaron roles
    //     if (!empty($roles) && is_array($roles)) {
    //         // Utiliza whereHas con or para filtrar por múltiples roles
    //         return $query->whereHas('roles', function ($query) use ($roles) {
    //             $query->whereIn('name', $roles);
    //         });
    //     }

    //     // Si no se proporcionaron roles, simplemente devuelve el query builder original
    //     return $query;
    // }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $srch = "%$search%";
            return $query
                ->where('id', 'like', $srch)
                ->orWhere('name', 'like', $srch)
                ->orWhere('email', 'like', $srch);
            // para una tabla externa, por ejemplo apellidos
            // para una tabla externa, no funciona para roles
            // ->orWhere('r_roles', function ($query) use ($srch) {
            //     return $query->where('name', 'like', $srch);
            // })
        }
    }

    public function r_roles()
    {
        return $this->belongsTo(Role::class);
    }
}
