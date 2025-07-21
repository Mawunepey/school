<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
     use HasFactory;

    protected $fillable = ['title', 'description', 'code', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function uploads()
{
    return $this->morphMany(\App\Models\Upload::class, 'uploadable');
}

}
