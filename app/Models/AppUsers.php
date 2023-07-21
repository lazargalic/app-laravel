<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserStreamer;
use App\Models\Country;

class AppUsers extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded=[];
    protected $table="app_users";

    public function login($email, $password){

        $password=md5($password);

        return AppUsers::where('app_users.email','=', $email)
            ->where('app_users.password','=', $password)
            ->First();
    }

    public function isStreamer(){

        return $this->hasMany(UserStreamer::class,'app_user_id', 'id');

    }

    public function countrr(){

        return $this->belongsTo(Country::class,'country_id', 'id');

    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

}
