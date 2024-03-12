<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    use HasFactory;

    protected $fileable = [
        'user_id',
        'distance',
    ];

    protected $guarded = [
        'created_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'distance' => 'integer',
        'created_at' => 'datetime',
    ];

}
