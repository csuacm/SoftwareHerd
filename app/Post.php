<?php

namespace SoftwareHerd;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function project()
    {
        return $this->belongsTo('SoftwareHerd/Project','posting_project');
    }
    
    public function comments()
    {
        return $this->hasMany('SoftwareHerd\Comment');
    }
}