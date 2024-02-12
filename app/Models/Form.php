<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_number',
        'form_class',
    ];

    public function classroom() {
        return $this->hasMany(Classroom::class);
    }
}
