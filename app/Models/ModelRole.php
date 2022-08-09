<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelRole extends Model
{
    use HasFactory;

    protected $table = 'models_roles';

    protected $fillable = ['model_id','role_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
