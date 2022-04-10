<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikesDislike extends Model
{
    protected $fillable = ['post_id', 'user_id', 'type'];
}
