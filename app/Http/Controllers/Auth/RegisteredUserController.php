<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Person;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'identification' =>['required','string','max:8','unique:'.Person::class],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'lowercase', 'string', 'max:20', 'unique:'.Person::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{
            DB::transaction(function () use ($request) {
                $person = Person::create([
                    'identification' => $request->identification,
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'gender' => $request->gender,
                    'birthdate' => $request->birthdate,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

                $user = User::create([
                    'person_id' => $person->id,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                // dd("hola");

                event(new Registered($user));

                // Auth::login($user);

                session()->flash('success', 'Asesor Registrado Exitosamente');

            });
        }catch(\Exception $e){
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al registrar al Asesor. Por favor, intenta nuevamente.');
            // (Opcional) Loguear el error para análisis
            Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }


        return redirect(route('dashboard.advisor.create', absolute: false));
    }
}
