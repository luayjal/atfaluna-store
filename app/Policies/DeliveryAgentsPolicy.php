<?php

namespace App\Policies;

use App\Models\DeliveryAgents;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryAgentsPolicy
{
    use HandlesAuthorization;
    public function before(User $user , $ability) {
        if($user->type  == 'super-admin') return true;
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasAbility('delivery.viewAny');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DeliveryAgents  $deliveryAgents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DeliveryAgents $deliveryAgents)
    {
        return $user->hasAbility('delivery.viewAny');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasAbility('delivery.create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DeliveryAgents  $deliveryAgents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DeliveryAgents $deliveryAgents)
    {
        return $user->hasAbility('delivery.update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DeliveryAgents  $deliveryAgents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DeliveryAgents $deliveryAgents)
    {
        return $user->hasAbility('delivery.delete');

    }

    public function viewEvaluation(User $user)
    {
        return $user->hasAbility('delivery.evaluation');
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DeliveryAgents  $deliveryAgents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DeliveryAgents $deliveryAgents)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DeliveryAgents  $deliveryAgents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DeliveryAgents $deliveryAgents)

   {
        //
    }
}
