<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'city'];

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
