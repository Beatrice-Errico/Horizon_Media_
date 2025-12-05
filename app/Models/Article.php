<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{

use HasFactory, Searchable;

public function toSearchableArray(){
    return [
        'id' => $this->id,
        'title' => $this->title,
        'subtitle' => $this->subtitle,
        'body' => $this->body,
        'category' => $this->category
    ];
}

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function readDuration(){
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 200);
        return intval($minutesToRead);
    }
    
        public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getImageUrlAttribute()
    {
        $path = $this->image;

        // Se NON contiene uno slash, lo considero solo nome file e lo metto in /images
        if (strpos($path, '/') === false) {
            $path = 'images/' . $path;
        }

        // Se invece è già tipo "images/IA.jpg" lo lascio così
        return asset($path);
    }

}
