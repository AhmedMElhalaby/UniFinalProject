<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name'];

    public function role_permissions(): HasMany
    {
        return $this->hasMany(RolePermission::class);
    }
    public function permissions(): HasManyThrough
    {
        return $this->hasManyThrough(Permission::class,RolePermission::class);
    }
}
