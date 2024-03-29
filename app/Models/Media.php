<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['cover_photo', 'profile_photo', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
