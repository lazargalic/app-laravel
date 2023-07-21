<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserStreamer;
Use Illuminate\Support\Facades\DB;

class LiveStream extends Model
{
    use HasFactory;

    protected $table="live_streams";
    public $timestamps=false;
    protected $guarded=[];
    public $fillable=['id', 'user_streamer_id', 'started_at', 'finished_at', 'thumbnail_picture'];

    public function userStreamer(){
        return $this->belongsTo(UserStreamer::class, 'user_streamer_id', 'id');

        //userstreamer filter
    }


    // ovaj metod nisam iskoristio na kraju jer sam skapirao da query builder nema paginator pa sam vratio na eloquent
    public function livesPagination(){

        $svi= DB::table('live_streams')
            ->join('user_streamers','live_streams.user_streamer_id','=','user_streamers.id')
            ->join('app_users','user_streamers.app_user_id','=','app_users.id')
            ->where('live_streams.finished_at', null)
            ->get();
        //return $svi;

        foreach ($svi as $item) {
            $item->categories=DB::table('user_streamer_categories')
                ->where('user_streamer_id','=',$item->user_streamer_id)->get();
        }

        return $svi;

    }

}
