<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
     use HasFactory;

    protected $fillable = ['name', 'email', 'subject'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function uploads()
{
    return $this->morphMany(\App\Models\Upload::class, 'uploadable');
}

}
