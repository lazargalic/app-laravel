<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LiveStreamComment extends Model
{
    use HasFactory;

    protected $table="live_stream_comments";

    public $timestamps=false;
    protected $guarded=[];
    public $fillable=['id', 'app_user_id', 'user_streamer_id', 'live_stream_id', 'user_streamer_challenge_id', 'tokens', 'comment', 'commented_at'];

    public function appUser(){

        return $this->belongsTo(AppUsers::class,'app_user_id', 'id');

    }

    public function challenges(){
        return $this->belongsTo(UserStreamerChallenge::class,'user_streamer_challenge_id', 'id');
    }


    public function VratiSveZaIspis($idlajv){

        $svi= DB::table('live_stream_comments')->Where('live_stream_id', $idlajv)->orderByDesc('commented_at')->get();

        foreach ($svi as $s){
            $s->username=\DB::table('app_users')->select('username')->where('id',$s->app_user_id)->first();
            $s->nameChallenge=\DB::table('user_streamer_challenges')->select('name_challenge')->where('id',$s->user_streamer_challenge_id )->first();
        }

        return $svi;

    }
}
