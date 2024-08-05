<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // Afișează formularul de autentificare
    public function showLoginForm()
    {
        return view('auth.login'); // Asigură-te că ai acest fișier în resources/views/auth
    }

    // Gestionează autentificarea utilizatorului
    public function login(Request $request)
    {
        // Validare input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentativă de autentificare
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            // Redirecționează utilizatorul dacă autentificarea a avut succes
            return Redirect::intended('dashboard');
        }

        // Redirecționează înapoi cu mesaj de eroare
        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // Gestionează deconectarea utilizatorului
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
