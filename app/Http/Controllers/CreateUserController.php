<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\BoundedContext\User\Infrastructure\CreateUserController as CreateUserControllerHex;

class CreateUserController extends Controller
{
    /**
     * @var CreateUserControllerHex
     */
    private CreateUserControllerHex $createUserController;

    public function __construct(CreateUserControllerHex $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $newUser = new UserResource($this->createUserController->__invoke($request));

        return response($newUser, 201);
    }
}
