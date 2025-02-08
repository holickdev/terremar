<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Request $request): View
    {
        return view('auth.profile-show', [
            'profile' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('auth.profile-edit', [
            'profile' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateB(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validación de los datos del formulario
        $data = $request->validated();

        $profile = $request->user();
        // dd($profile);

        try {
            DB::transaction(function () use ($data,$profile) {
                // Obtener el perfil
                // Actualizar los datos del perfil
                $profile->person->update([
                    'identification' => $data['identification'],
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'phone' => $data['phone'],
                    'birthdate' => $data['birthdate'],
                    'gender' => $data['gender'],
                ]);

                $picture = $profile->picture;

                if (isset($data['picture'])) {
                    if ($picture) {
                        // Limpia la ruta si es necesario
                        $picture = str_replace('\\', '/', $picture);

                        // Verifica si el archivo existe y elimínalo
                        if (Storage::disk('public')->exists($picture)) {
                            Storage::disk('public')->delete($picture); // Ahora apunta correctamente al disco 'public'
                        }
                    }
                    $picture = $data['picture']->store('profile', 'public'); // Almacena en storage/app/public/media
                }

                $profile->update([
                    'email' => $data['email'],
                    'picture' => $picture
                ]);
            });
            session()->flash('success', 'Propiedad registrada exitosamente.');
        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al registrar la propiedad. Por favor, intenta nuevamente.<br/>' . $e);
            // (Opcional) Loguear el error para análisis
            // \Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }

        // Redirigir a una página de éxito o con mensaje
        return redirect()->route('dashboard.profile.show');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
