<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     required={"name", "cpf", "data_nascimento"},
 *     @OA\Property(property="id", type="integer", format="int64", description="ID do usuário"),
 *     @OA\Property(property="name", type="string", description="Nome do usuário"),
 *     @OA\Property(property="cpf", type="string", description="CPF do usuário"),
 *     @OA\Property(property="data_nascimento", type="string", format="date", description="Data de nascimento do usuário")
 * )
 */
class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'data_nascimento',
    ];
}
