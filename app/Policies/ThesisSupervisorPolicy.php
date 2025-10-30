<?php

namespace App\Policies;

use App\Models\User;
use App\Models\thesis_supervisor;
use Illuminate\Auth\Access\Response;

class ThesisSupervisorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, thesis_supervisor $thesisSupervisor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, thesis_supervisor $thesisSupervisor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, thesis_supervisor $thesisSupervisor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, thesis_supervisor $thesisSupervisor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, thesis_supervisor $thesisSupervisor): bool
    {
        return false;
    }
}
