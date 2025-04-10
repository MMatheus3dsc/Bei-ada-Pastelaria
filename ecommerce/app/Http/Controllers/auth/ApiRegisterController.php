<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validação
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // atenção: sua tabela é "user", no singular
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
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
    
        // Gerar token Sanctum
        $token = $users->createToken('api-token')->plainTextToken;
    
        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'token' => $token,
            'users' => $users
        ]);
    }
    
}
