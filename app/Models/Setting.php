<?php

namespace App\Models;

use App\Enums\SettingType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = ['key','type','name','title','value','image'];

    protected $casts = [
        'type' => SettingType::class,
    ];
}
