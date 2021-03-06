<?php

namespace SoftwareHerd;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function projects()
    {
        return $this->hasMany('SoftwareHerd\Project', 'project_admin_user_id');
    }
    
    public function comments()
    {
        return $this->hasMany('SoftwareHerd\Comment');
    }
    
    public function isSuperAdmin()
    {
        return $this->admin;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_link', 'website_link', 'bio', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
