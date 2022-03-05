<?php

namespace App\Models;

use App\Casts\ImageCast;
use App\Casts\PasswordCast;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'username',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => PasswordCast::class,
        'image' => ImageCast::class
    ];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function followers(): HasMany
    {
        return $this->hasMany(UserFollower::class, 'user', 'id');
    }

    public function following(): HasMany
    {
        return $this->hasMany(UserFollower::class, 'following', 'id');
    }

    public function isFollowing(User $user)
    {
       return $this->following->where('user', $user->id)->first() != null;
    }

    public function isBeingFollowed(User $user)
    {
        $this->followers()->where('following', $user->id)->exists();
    }

    public function isEmailValid ($email)
    {
       return User::where('email', $email)->exists();
    }
}
