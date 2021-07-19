<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BlogEntry extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'content',
      'publication_date',
      'header_image'
    ];

    protected $casts = [
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
      'publication_date' => 'datetime'
    ];

    function first_n_sentences($n) {
      $until = 0;
      while($n-- > 0) {
        $until = strpos($this->content, '.', $until) + 1;
      }
      return substr($this->content, 0, $until);
    }

    public static function get_visible() {
      return BlogEntry::where(
        'publication_date',
        '<=',
        Carbon::now()
      );
    }
}
