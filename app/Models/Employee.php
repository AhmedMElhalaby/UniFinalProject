<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = ['name','email','password','avatar','locale','is_active'];

    protected $hidden = ['password'];

    public function roles(): HasMany
    {
        return $this->hasMany(ModelRole::class,'model_id','id');
    }

    public function permissions(): HasMany
    {
        return $this->hasMany(ModelPermission::class,'permission_id','id');
    }

    public function hasRole($id): bool{
        return (bool)ModelRole::where('model_id', $this->id)->where('role_id', $id)->first();
    }

    public function hasPermission($id): bool{
        return (bool)ModelPermission::where('model_id', $this->id)->where('permission_id', $id)->first();
    }

    public function can($abilities, $arguments = []): bool
    {
        $Permission = Permission::where('key',$abilities)->first();
        if(!$Permission)
            return true;
        return $this->hasPermission($Permission->id);
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn ($value, $attributes) => $attributes['password'] = Hash::make($value),
        );
    }
}
