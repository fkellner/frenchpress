<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * Mass-Assignable model fields
     *
     * @var array
     */
    protected $fillable = [
      'key',
      'value'
    ];

    protected $primaryKey = 'key';
}
