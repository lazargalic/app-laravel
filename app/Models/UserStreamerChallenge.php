<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStreamerChallenge extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table="user_streamer_challenges";

    public $fillable=['id', 'user_streamer_id', 'name_challenge', 'price',  'created_at', 'deleted_at'];



}
