<?php

namespace SoftwareHerd;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongs_to('SoftwareHerd\Comment');
    }
}