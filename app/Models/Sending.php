<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sending extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'options' => 'array',
    // ];

    protected $casts = [
        'to_time_manually' => 'datetime:H:i'
    ];

    protected $fillable = ['id', 'user_id', 'user_name'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
