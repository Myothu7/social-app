<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Feeling;

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
   
}
