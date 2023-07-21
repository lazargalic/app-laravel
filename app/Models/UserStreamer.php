<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserStreamer extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table="user_streamers";

    public $fillable=['id', 'app_user_id', 'started_at', 'deleted_at'];

    public function appUser(){
        return $this->belongsTo(AppUsers::class,'app_user_id','id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'user_streamer_categories');
    }


    public function numberfollowers($idstreamer){
        return DB::table('user_follows')->where('user_streamer_id', $idstreamer)->count();
    }




    public function challenges(){
        return $this->hasMany(UserStreamerChallenge::class, 'user_streamer_id', 'id');
    }

    //Ovo dole ne radi a identicno je kao i ovo gore ?? zasto nece nece ni da izbroji za prikaz na home-u


    public function followers(){
        return $this->hasMany(UserFollow::class, 'user_streamer_id ', 'id');
    }




}
