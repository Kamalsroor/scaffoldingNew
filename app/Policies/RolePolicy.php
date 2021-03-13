<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.roles');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.roles');
    }

     /**
     * Determine whether the user can view trashed roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.roles')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\role $Role
     * @return mixed
     */
    public function restore(User $user, role $Role)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.roles')) && $this->trashed($Role);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\role $Role
     * @return mixed
     */
    public function forceDelete(User $user, role $Role)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('manage.roles')) && $this->trashed($Role);
    }

    /**
     * Determine wither the given Role is trashed.
     *
     * @param $Role
     * @return bool
     */
    public function trashed($Role)
    {
        return $this->hasSoftDeletes() && method_exists($Role, 'trashed') && $Role->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(role::class))->getTraits())
        );
    }
}
