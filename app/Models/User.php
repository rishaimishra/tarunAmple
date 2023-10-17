<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
 
  protected $primaryKey = 'user_id'; 

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'reward_time',
        'follower_keyword',
        'status',
        'added_date',
        'register_date',
        'user_type',
        'total_ample',
        'referral_no',
        'is_driver',
        'ref_vendor_id',
    ];

   
   
    protected $hidden = [
        'password',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
