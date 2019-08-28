<?php

function is_user_in_project($users)
{
    foreach ($users as $user) {
        if ($user->id == 2)
            return true;
    }

    return false;
}
