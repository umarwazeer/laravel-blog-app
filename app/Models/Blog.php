<?php
// app/Models/Blog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'content',
        'image',  // New field for image
        'video'   // New field for video
    ];


    public function getImagePathAttribute($value)
    {
        return $value ? url("storage/images/$value") : url('storage/app/puplic/images/placeholder.jpg');
    }
}

