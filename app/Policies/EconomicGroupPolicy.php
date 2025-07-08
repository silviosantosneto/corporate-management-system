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
        // Exemplo simples: todo mundo pode editar
        return true;

        // Ou: só quem criou pode editar
        // return $user->id === $group->created_by;
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
