<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogEntry extends Model
{
    use HasFactory;

    /**
     * Mass-Assignable model fields
     *
     * @var array
     */
    protected $fillable = [
      'title',
      'content',
      'publication_date',
      'header_image'
    ];

    /**
     * Model fields that are cast to some type
     *
     * @var array
     */
    protected $casts = [
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
      'publication_date' => 'datetime'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'header_image' => '',
    ];

    /**
     * Store image and set header url accordingly
     *
     * @param Illuminate\Http\UploadedFile $file
     */
    function setHeader($file) {
      $name = $file->getClientOriginalName();
      $this['header_image'] = $file
        ->storeAs('headers/'.$this->id, $name, 'public');
      $this->save();
    }

    /**
     * Get the first n lines of the content
     *
     * @param int $n
     * @return string
     */
    function first_n_lines($n) {
      $lines = explode('
', $this->content);
      $first_n = array_slice($lines, 0, $n);
      return implode('
', $first_n);
    }

    /**
     * Get a query that returns only visible blog entries
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public static function get_visible() {
      return BlogEntry::where(
        'publication_date',
        '<=',
        Carbon::now()
      );
    }

    /**
     * Extend delete method to clean up stored images
     */
    function delete() {
      Storage::disk('public')->deleteDirectory('headers/'.$this->id);
      parent::delete();
    }

}
