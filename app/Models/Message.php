<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'message',
        'image',
        'user_id'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
