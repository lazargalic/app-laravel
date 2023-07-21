<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ActivityModel extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $table="activities";
    public $fillable=['id', 'activity','username', 'email', 'activity_at'];
    public $guarded=[];




}
