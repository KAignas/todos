<?php

namespace App\Policies;

use App\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class EventPolicy
 * @package App\Policies
 */
class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Check if user update event
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function update(User $user, Event $event)
    {
        return $event->user_id == $user->id;
    }


    /**
     * Check if user delete event
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function delete(User $user, Event $event)
    {
        return $event->user_id == $user->id;
    }
}
