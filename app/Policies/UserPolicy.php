<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Política que compara si el usuario autenticado es el mismo que el
     * usuario que queremos editar.
     */
    public function edit(User $authUser, User $user)
    {
        return $authUser->id === $user->id ? Response::allow() : Response::deny('No autorizado');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id ? Response::allow() : Response::deny('No autorizado');
    }

    public function destroy(User $authUser, User $user)
    {
        return $authUser->id === $user->id ? Response::allow() : Response::deny('No autorizado');
    }
}
