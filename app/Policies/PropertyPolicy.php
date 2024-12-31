<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Permitir la visualización de todas las propiedades si el usuario es un administrador
        return $user->isAdmin() || $user->isGerente();  // Cambiar según la lógica de roles en tu aplicación
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Property $property)
    {
        // Verificar si el usuario está asociado a la propiedad a través de la relación muchos a muchos
        return $property->users->contains($user)
            ? Response::allow()
            : Response::deny('No tienes acceso a esta propiedad.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de propiedades si el usuario es un administrador o tiene permisos específicos
        return !$user->isBlogger();  // Cambiar según la lógica de roles en tu aplicación
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Property $property): bool
    {
        // Permitir la actualización solo si el usuario es el propietario de la propiedad o un administrador
        return $property->users->contains($user) || $user->isGerente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Property $property): bool
    {
        // Permitir la eliminación solo si el usuario es el propietario de la propiedad o un administrador
        return $property->users->contains($user) || $user->isGerente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Property $property): bool
    {
        // Permitir la restauración solo si el usuario es un administrador
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Property $property): bool
    {
        // Permitir la eliminación permanente solo si el usuario es un administrador
        return $user->isAdmin();
    }
}
