<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    protected $fillable = [
        "name",
        "username",
        "email",
        "password",
        ];

        protected $hidden = [
            "password",
            "remember_token",
        ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
