<?php

namespace App\Models;

use App\Models\Post\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name',
        'email',
        'password',
        'avatar',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array(
        'password',
        'remember_token',
    );

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = array(
        'email_verified_at' => 'datetime',
    );
    /**
     * @var mixed
     */
    private $profile;

    public function testimonial(): HasOne
    {
        return $this->hasOne(Testimonial::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getCreatedAtAttribute () {

        return $this->updated_at->diffForHumans();
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
