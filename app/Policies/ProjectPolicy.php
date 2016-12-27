<?php

namespace SoftwareHerd\Policies;

use SoftwareHerd\User;
use SoftwareHerd\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function admin(User $user, Project $project)
    {
        $user_projects = \DB::table('user_projects')->where('project_id', $project->id)->where('user_id', $user->id)->first();
        if(!$user_projects)
            return false;
        if($user_projects->level > 0)
            return true;
        else
            return false;
    }
    
    public function leader(User $user, Project $project)
    {
        $user_projects = \DB::table('user_projects')->where('project_id', $project->id)->where('user_id', $user->id)->first();
        if(!$user_projects)
            return false;
        if($user_projects->level > 1)
            return true;
        else
            return false;
    }
    
    public function creator(User $user, Project $project)
    {
        $user_projects = \DB::table('user_projects')->where('project_id', $project->id)->where('user_id', $user->id)->first();
        if(!$user_projects)
            return false;
        if($user_projects->level > 2)
            return true;
        else
            return false;
    }
}
