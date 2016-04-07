<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'projects_photos';

    protected $fillable = ['path', 'path_thumb'];
}
