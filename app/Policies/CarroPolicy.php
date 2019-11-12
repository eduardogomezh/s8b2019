<?php

namespace App\Policies;

use App\User;
use App\Carro;

use Illuminate\Auth\Access\HandlesAuthorization;

class CarroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any = carros.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function before($user, $ability){
        if ($user->origen == "Administrador") return true;
        else return null;

    }

    public function listar(User $user){
        if ($user->origen == "Web") return false;
        if ($user->origen == "Sistema") return true;
        if ($user->origen == "Gerente") return true;
    }

    public function acciones(User $user){
        if ($user->origen == "Web") return false;
        if ($user->origen == "Sistema") return false;
        if ($user->origen == "Gerente") return true;
    }





    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the = carro.
     *
     * @param  \App\User  $user
     * @param  \App\=Carro  $Carro
     * @return mixed
     */
    public function view(User $user, Carro $Carro)
    {
        //
    }

    /**
     * Determine whether the user can create = carros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the = carro.
     *
     * @param  \App\User  $user
     * @param  \App\Carro  $Carro
     * @return mixed
     */
    public function update(User $user, Carro $Carro)
    {
        //
    }

    /**
     * Determine whether the user can delete the = carro.
     *
     * @param  \App\User  $user
     * @param  \App\=Carro  $=Carro
     * @return mixed
     */
    public function delete(User $user, Carro $Carro)
    {
        //
    }

    /**
     * Determine whether the user can restore the = carro.
     *
     * @param  \App\User  $user
     * @param  \App\=Carro  $=Carro
     * @return mixed
     */
    public function restore(User $user, Carro $Carro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the = carro.
     *
     * @param  \App\User  $user
     * @param  \App\=Carro  $=Carro
     * @return mixed
     */
    public function forceDelete(User $user, Carro $Carro)
    {
        //
    }
}
