<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{

    protected $redirectTo = 'admin.products.index';
    public function showLoginForm()
    {
        return view('auth.login'); // Assume que você tem uma view em resources/views/auth/login.blade.php
    }


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) { 
        $request->session()->regenerate();
        return redirect()->intended(route($this->redirectTo));
    }

    return back()->withErrors(['email' => 'Credenciais inválidas.']);
}

    

    public function showRegistrationForm()
    {
        return view('auth.register'); // Assume que você tem uma view em resources/views/auth/register.blade.php
    }

    public function register(Request $request)
    {
        // Validação
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string|min:6|confirmed',
            'cpf' => 'required|string|size:11|unique:users,cpf',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Criar usuário
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
    
       Auth::login($users);
       return redirect()->route($this->redirectTo);
    }
   
    


    public function logout(Request $request)
    {
        // Para logout web
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }


    public function apiLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
?>