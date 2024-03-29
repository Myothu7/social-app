<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Feeling;
use App\Models\Like;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','feeling_id', 'content', 'photo','status'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feeling()
    {
        return $this->belongsTo(Feeling::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function authlike($auth_id, $post_id)
    {
        $like = Like::where('user_id','=', $auth_id)
                     ->where('post_id', '=', $post_id)->get();

        if($like) {
            return count($like);
        }

        return false;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
