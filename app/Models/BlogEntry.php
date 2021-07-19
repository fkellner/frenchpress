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

    protected $dates = [
      'created_at',
      'updated_at',
      'publication_date'
    ];

    function first_n_sentences($n) {
      $until = 0;
      while($n-- > 0) {
        $until = strpos($this->content, '.', $until) + 1;
      }
      return substr($this->content, 0, $until);
    }
}
