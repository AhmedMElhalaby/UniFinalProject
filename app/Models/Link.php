<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = ['name','url','icon','order','parent_id','is_active'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Link::class,'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(Link::class,'parent_id');
    }
    public function permission(): HasOne
    {
        return $this->hasOne(Permission::class,'link_id');
    }
}
