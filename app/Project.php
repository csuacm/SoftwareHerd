<?php

namespace SoftwareHerd;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo('SoftwareHerd\User');
    }
}
