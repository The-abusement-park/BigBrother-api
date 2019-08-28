<?php

use Illuminate\Support\Facades\Auth;

function is_user_in_project($users)
{
    foreach ($users as $user) {
        if ($user->id == Auth::user()->id)
            return true;
    }

    return false;
}

function is_user_in_any_project($projects)
{
    foreach ($projects as $project) {
        foreach ($project->user as $user)
            if ($user->id == Auth::user()->id)
                return true;
    }

    return false;
}

function is_admin()
{
    return Auth::user()->role == 'Admin' || Auth::user()->role == 'SuperAdmin';
}
