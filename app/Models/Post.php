<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'create_at',
        'updated_at'
    ];

    /* RELACION 1:N INVERSA */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* RELACION N:N */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /* RELACION 1:1 POLIMORFICA */
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}
