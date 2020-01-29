<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Post extends Model
{
    //
    protected $table = 'posts';

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    protected $fillable = [
        'title', 'subtitle', 'slug', 'content'
    ];
}
