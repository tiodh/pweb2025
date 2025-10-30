<?php

namespace App\Policies;

use App\Models\User;
use App\Models\teaching_lecturers;
use Illuminate\Auth\Access\Response;

class TeachingLecturersPolicy
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
    public function view(User $user, teaching_lecturers $teachingLecturers): bool
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
    public function update(User $user, teaching_lecturers $teachingLecturers): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, teaching_lecturers $teachingLecturers): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, teaching_lecturers $teachingLecturers): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, teaching_lecturers $teachingLecturers): bool
    {
        return false;
    }
}
