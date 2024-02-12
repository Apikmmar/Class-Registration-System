<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'class_name',
        'class_limit',
    ];

    public function form() {
        return $this->belongsTo(Form::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
