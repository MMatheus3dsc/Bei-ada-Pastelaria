<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{

    protected $fillable = ['name', 'email', 'password','cpf','data_nascimento','address','phone','genero']; // Campos permitidos para preenchimento

    protected $hidden = ['password'];
}
