<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'title',
        'description',
        'meeting_date',
    ];

    protected $dates = [
        'meeting_date',
    ];
}
