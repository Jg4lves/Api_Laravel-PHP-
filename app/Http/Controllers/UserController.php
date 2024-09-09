<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
/**
 * @OA\Info(
 *     title="Minha API",
 *     description="Descrição da API",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="contato@exemplo.com"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Lista todos os usuários",
     *     description="Retorna uma lista de todos os usuários cadastrados",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuários",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *     )
     * )
     */
    public function show() {
        $users = User::all();
        return view("welcome", ["users"=> $users]); 
    }

    /**
     * @OA\Get(
     *     path="/users/{name}",
     *     summary="Exibe um usuário específico",
     *     description="Retorna os detalhes de um usuário com base no nome fornecido",
     *     @OA\Parameter(
     *         name="name",
     *         in="path",
     *         description="Nome do usuário",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes do usuário",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado"
     *     )
     * )
     */
    public function showName($name) {
        $user = User::where("name", $name)->first();
        return view("showByName", ["user" => $user]);
    }

    /**
     * @OA\Get(
     *     path="/users/create",
     *     summary="Exibe o formulário de criação de usuário",
     *     description="Retorna a view com o formulário para adicionar um novo usuário",
     *     @OA\Response(
     *         response=200,
     *         description="Formulário de adição de usuário",
     *     )
     * )
     */
    public function create() {
        return view('addUser'); // Exibe o formulário para adicionar um usuário
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     summary="Armazena um novo usuário",
     *     description="Recebe os dados do formulário e cria um novo usuário no banco de dados",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro de validação"
     *     )
     * )
     */
    public function store(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->data_nascimento = $request->data_nascimento;
        $user->save();

        return redirect('/');
    }
}
