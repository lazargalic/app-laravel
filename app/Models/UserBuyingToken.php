<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBuyingToken extends Model
{
    use HasFactory;


    public $timestamps=false;

    protected $table="user_buying_tokens";

    public $fillable=['id', 'app_user_id', 'bought_tokens', 'bought_at', 'status'];

    public function user(){
        return $this->belongsTo(AppUsers::class,'app_user_id', 'id');
    }


}
