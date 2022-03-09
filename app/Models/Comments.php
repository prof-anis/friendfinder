<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

   public function User ()
   {
       return $this->belongTo(User::class, 'user_id');
   }
   public function Post ()
   {
       return $this->belongTo(Post::class, 'post_id');
   }

  
}
