<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges', 'user_id', 'badge_id')->withTimestamps();
    }

    public function avatars()
    {
        return $this->belongsToMany(Avatar::class, 'user_avatars', 'user_id', 'avatar_id');
    }

    public function getAvatarImageAttribute($value)
    {
        $avatar = $this->avatars->last();
        return $value ? $avatar->avatar_image : 'images/avatars/level' . $this->level . '.png';
    }

    public function coins(){
        return $this->hasMany(UserCoin::class);
    }

        public function items()
    {
        return $this->belongsToMany(ShopItem::class, 'users_items', 'user_id', 'item_id')->withTimestamps();
    }




}
