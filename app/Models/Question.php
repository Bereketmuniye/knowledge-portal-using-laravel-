<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function askedBy()
{
    return $this->belongsTo(User::class, 'asked_by');
}

public function answeredBy()
{
    return $this->belongsTo(User::class, 'answered_by');
}

public function answers()
{
    return $this->hasMany(Answer::class);
}
}
