<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'contents',
        'reporting_time',
        'user_id'
    ];

    protected $dates = [
        'reporting_time',
        'deleted_at'
    ];

    const List = 10;
}
