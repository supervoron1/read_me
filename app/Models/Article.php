<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    // чтобы можно было использовать Carbon (по умолчанию знает только про created_at и updated_at)
    public $dates = ['published_at'];

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

    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans()
    {
        // используем Carbon
//        return $this->created_at->diffForHumans();
        return $this->published_at->diffForHumans();
    }

    // перенесем логику в scope, чтобы сделать контроллер тоньше
    public function scopeLastLimit($query, $limit)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function scopeAllPaginate($query, $number)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($number);
    }
}
