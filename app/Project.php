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
	
	public function posts()
    {
        return $this->hasMany('SoftwareHerd\Post', 'posting_project')->orderBy('created_at', 'desc');
    }
}
