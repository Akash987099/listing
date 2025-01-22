<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins'; 
    
    protected $fillable = [
        'id', 'username',  'name', 'usertype', 'show_password', 'mobile' , 'status' , 'role' ,  'password', 'email', 'signature1' , 'signature2' , 'header_logo' , 'footer_logo', 'first_sign_name' , 'second_sign_name' , 'designation1' , 'designation2' , 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
