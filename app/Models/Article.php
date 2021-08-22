<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

//    protected $guarded = [];

    // статья может иметь много комментариев
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // отношение статьи с объектом статистики - один_к_одному
    public function state()
    {
        return $this->hasOne(State::class);
    }

    // статья относится ко множеству тэгов
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
