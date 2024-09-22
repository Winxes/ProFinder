<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'photo_path',
        'likes',
        'comments_count',
        'user_id',
        'scholarship',
    ];

    /**
     * Relationship: A post belongs to the user who was logged in
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A post belongs to many tags
     */
    public function tags() 
    {
            return $this->belongsToMany(Tag::class);
        
    }
    public function comments()
        {
            return $this->hasMany(Comment::class);
        }
}
