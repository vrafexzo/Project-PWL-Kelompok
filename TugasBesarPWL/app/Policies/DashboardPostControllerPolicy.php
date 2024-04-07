<?php

namespace App\Policies;

use App\Models\DashboardPostController;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DashboardPostControllerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DashboardPostController $dashboardPostController): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DashboardPostController $dashboardPostController): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DashboardPostController $dashboardPostController): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DashboardPostController $dashboardPostController): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DashboardPostController $dashboardPostController): bool
    {
        //
    }
}
