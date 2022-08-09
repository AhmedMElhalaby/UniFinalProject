<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelPermission extends Model
{
    use HasFactory;

    protected $table = 'models_permissions';

    protected $fillable = ['model_id','permission_id'];

    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
