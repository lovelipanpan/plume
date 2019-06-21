<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function show(User $user, $currentTopic)
    {
        if($currentTopic->category_id =! 1 || $currentTopic->user_id == $user->id){
            return true;
        }
    }
}
