<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allusers extends Model
{
    protected $table = 'allusers';
    protected $primaryKey = 'openid';

    protected $fillable = [
        'openid', 'session_key', 'nickName', 'avatarUrl' , 'province' , 'city'
    ];
}
