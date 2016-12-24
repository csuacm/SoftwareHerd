<?php

namespace SoftwareHerd;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('SoftwareHerd\Comment');
    }
    
    public function user()
    {
        return $this->belongsTo('SoftwareHerd\User');
    }
}