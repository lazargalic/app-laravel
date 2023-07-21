<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStreamerCategories extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table="user_streamer_categories";

    public $fillable=['id', 'category_id', 'user_streamer_id', 'added_at', 'deleted_at'];
}
