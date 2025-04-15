<?php

namespace App\Http\Controllers;

use App\Models\User; // Certifique-se de ter o Model User configurado
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para hash de senhas
use Illuminate\Validation\Rule; // Para validações avançadas

class UserController extends Controller
{
    // Lista todos os usuários
    public function index()
    {
        return User::all(); // Retorna todos os registros como JSON
    }

    // Exibe um usuário específico pelo ID
    public function show($id)
    {
        $user = User::findOrFail($id); // Busca o usuário pelo ID
        return response()->json($user);
    }

    // Cria um novo usuário
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // E-mail único na tabela
            'password' => 'required|string|min:6', // Senha mínima de 6 caracteres
            'cpf' => 'required|size:11|unique:users,cpf', // CPF único e exatamente 11 caracteres
            'birth_date' => 'required|date', // Data de nascimento no formato válido
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Número de telefone
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); // Hash da senha

        $user = User::create($validatedData); // Criação do usuário
        return response()->json($user, 201); // Retorna o usuário criado
    }

    // Atualiza um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Busca o usuário pelo ID

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', Rule::unique('users', 'email')->ignore($user->id)], // Permite o mesmo email para o próprio usuário
            'password' => 'sometimes|string|min:6',
            'cpf' => ['sometimes', 'size:11', Rule::unique('users', 'cpf')->ignore($user->id)],
            'birth_date' => 'sometimes|date',
            'address' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:15',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']); // Atualiza a senha com hash
        }

        $user->update($validatedData); // Atualiza o usuário
        return response()->json($user); // Retorna o usuário atualizado
    }

    // Remove um usuário pelo ID
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Busca o usuário pelo ID
        $user->delete(); // Remove o usuário
        return response()->json(['message' => 'Usuário deletado com sucesso.']);
    }
}
