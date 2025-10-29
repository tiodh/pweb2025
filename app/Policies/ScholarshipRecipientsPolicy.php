<?php

namespace App\Policies;

use App\Models\User;
// 1. (WAJIB) Perbaiki nama Model yang di-import
use App\Models\ScholarshipRecipient;
use Illuminate\Auth\Access\Response;

class ScholarshipRecipientsPolicy
{
    /**
     * Tentukan apakah user bisa melihat SEMUA data.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    public function view(User $user, ScholarshipRecipient $scholarshipRecipient): bool
    {

        return true;
    }

    public function create(User $user): bool
    {
        // 5. Hanya izinkan jika role user adalah 'admin'
        // (Pastikan model User Anda punya kolom 'role')
        return $user->role === 'admin';
    }

    /**
     * Tentukan apakah user bisa MENGUPDATE data.
     */
    // 6. (WAJIB) Perbaiki type-hint Model
    public function update(User $user, ScholarshipRecipient $scholarshipRecipient): bool
    {
        return $user->role === 'admin';
    }


    public function delete(User $user, ScholarshipRecipient $scholarshipRecipient): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, ScholarshipRecipient $scholarshipRecipient): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, ScholarshipRecipient $scholarshipRecipient): bool
    {
        return $user->role === 'admin';
    }
}
