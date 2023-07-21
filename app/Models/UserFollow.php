<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table="user_follows";
    public $fillable=['id', 'app_user_id', 'user_streamer_id', 'followed_at'];
    protected $guarded=[];

    public function userStreamers() {
        return $this->belongsTo(UserStreamer::class,'user_streamer_id', 'id');
    }
}
