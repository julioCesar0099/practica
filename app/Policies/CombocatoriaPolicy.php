<?php

namespace App\Policies;

use App\User;
use App\Combocatoria;
use Illuminate\Auth\Access\HandlesAuthorization;

class CombocatoriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the combocatoria.
     *
     * @param  \App\User  $user
     * @param  \App\Combocatoria  $combocatoria
     * @return mixed
     */
    public function view(User $user, Combocatoria $combocatoria)
    {
        return  $user->hasPermissionTo('ver convocatorias');
    }

    /**
     * Determine whether the user can create combocatorias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->hasPermissionTo('crear convocatorias');
    }

    /**
     * Determine whether the user can update the combocatoria.
     *
     * @param  \App\User  $user
     * @param  \App\Combocatoria  $combocatoria
     * @return mixed
     */
    public function update(User $user, Combocatoria $combocatoria)
    {
        //
    }

    /**
     * Determine whether the user can delete the combocatoria.
     *
     * @param  \App\User  $user
     * @param  \App\Combocatoria  $combocatoria
     * @return mixed
     */
    public function delete(User $user, Combocatoria $combocatoria)
    {
        return  $user->hasPermissionTo('eliminar convocatorias');
    }
}
