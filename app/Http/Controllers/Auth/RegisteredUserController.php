<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        DB::beginTransaction();
        try {
            // Validation
            $request->validate([
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'domisili' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:15'],
                'status' => ['required', 'string', 'in:murid,guru,pembina'],
            ]);

            // Create User
            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Create User Detail dengan user_id yang benar
            UserDetail::create([
                'user_id' => $user->id, // Pastikan ini ada
                'name' => $request->fullname, // Gunakan dari request langsung
                'domisili' => $request->domisili,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
            ]);

            // Assign role jika menggunakan Spatie Permission
            if (method_exists($user, 'assignRole')) {
                $user->assignRole('user');
            }

            // Fire registered event
            event(new Registered($user));

            DB::commit();

            // Login user
            Auth::login($user);

            // Redirect berdasarkan role atau ke dashboard default
            return redirect()->intended(route('dashboard'));
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            // Re-throw validation exceptions agar error muncul di form
            throw $e;
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log error untuk debugging
            \Log::error('Registration Error: ' . $e->getMessage(), [
                'user_data' => $request->only(['fullname', 'email', 'domisili', 'phone_number', 'status']),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Return dengan error message
            return back()->withInput()->withErrors([
                'registration' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'
            ]);
        }
    }
}