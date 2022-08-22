<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use  SoftDeletes;

    protected $guarded = [];

//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    //    public function userImage()
//    {
//        $photoPath = ($this->photo) ? $this->photo : '/uploads/admins/not_available.png';
//
//        return '/storage' . $photoPath;
//    }
}
