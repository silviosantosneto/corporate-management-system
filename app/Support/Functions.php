<?php

use App\Models\EconomicGroup;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;

/**
 * Get the currently authenticated user.
 * @return Authenticatable|null
 */
function user(): ?Authenticatable
{
    if (auth()->check()) {
        return auth()->user();
    }

    return null;
}

/**
 * Get all EconomicGroups or a specific one by ID.
 *
 * @param int|null $id
 * @return Builder|EconomicGroup|null
 */
function groups(?int $id = null): Builder|EconomicGroup|null
{
    if ($id) {
        return EconomicGroup::find($id);
    }

    return EconomicGroup::query();
}
