<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';
    protected $fillable = ['name', 'email', 'password','cpf','birthday','address','phone',]; // Campos permitidos para preenchimento

    protected $hidden = ['password'];
}
