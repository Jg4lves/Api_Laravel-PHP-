<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * @OA\Get(
 *     path="/",
 *     summary="Lista todos os usuários",
 *     description="Recupera e exibe todos os usuários cadastrados.",
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
Route::get('/', [UserController::class, 'show']);

/**
 * @OA\Get(
 *     path="/user/add",
 *     summary="Exibe o formulário de criação de usuário",
 *     description="Retorna a view com o formulário para adicionar um novo usuário.",
 *     @OA\Response(
 *         response=200,
 *         description="Formulário de adição de usuário"
 *     )
 * )
 */
Route::get('/user/add', [UserController::class, 'create']);

/**
 * @OA\Post(
 *     path="/user",
 *     summary="Armazena um novo usuário",
 *     description="Recebe os dados do formulário e cria um novo usuário no banco de dados.",
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
Route::post('/user', [UserController::class, 'store']);

/**
 * @OA\Get(
 *     path="/{name}",
 *     summary="Exibe um usuário específico",
 *     description="Retorna os detalhes de um usuário com base no nome fornecido.",
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
Route::get('/{name}', [UserController::class, 'showName']); // Mantenha esta rota no final
