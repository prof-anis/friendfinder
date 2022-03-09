<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRelevantToUser(Builder $builder, User $user)
    {
        return $builder->whereIn('user_id', $user->following()->pluck('user'));
    }
    public function Comments ()
    {
        return $this->hasMany(Comments::class);
    }
}
