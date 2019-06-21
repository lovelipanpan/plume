<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{

    public function show(?User $user, $category)
    {
        if($user || $category->id != 1){
            return true;
        }
    }
}
