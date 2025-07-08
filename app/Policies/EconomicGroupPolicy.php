<?php

namespace App\Policies;

use App\Models\{EconomicGroup, User};

class EconomicGroupPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EconomicGroup $group): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    //    public function delete(User $user, EconomicGroup $economicGroup): bool
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Determine whether the user can permanently delete the model.
    //     */
    //    public function forceDelete(User $user, EconomicGroup $economicGroup): bool
    //    {
    //        //
    //    }
}
