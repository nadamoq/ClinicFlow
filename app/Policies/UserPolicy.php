<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {

        if ($user->isAdmin()) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, User $model)
    {
        return false;
    }

    public function delete(User $user, User $model)
    {
        return false;
    }
}
