<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogEntry extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'content',
      'publication_date',
      'header_image'
    ];
}
