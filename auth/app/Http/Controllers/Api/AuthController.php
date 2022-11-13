<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\LoginResource;
use App\Http\Resources\Api\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    const USERNAME = 'email';

    /** @var AuthService $authService */
    protected AuthService $authService;

    /**
     * LoginController constructor.
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Authentication.
     * Аутентификация.
     *
     * @param LoginRequest $request
     *
     * @bodyParam username string required Имя пользователя
     * @bodyParam password string required Пароль ползователя
     *
     * @return LoginResource
     * @throws ValidationException
     */
    public function login(LoginRequest $request): LoginResource
    {
        $user = $this->authService->login($request->validated());
        return new LoginResource($user);
    }

    /**
     * Register
     * Регистрация
     *
     * @param RegisterRequest $request
     * @bodyParam  name string required Имя пользователя. Пример: "John Doe"
     * @bodyParam  password string required пароль пользователя.
     * @bodyParam  password_confirmation string required подтверждение пользователя.
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $this->authService->register($request->validated());

        return response()->json(['message' => 'You are successfully registered']);
    }


    /**
     * Log the user out (Invalidate the token).
     * Выйти из профиля
     *
     * @authenticated
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    /**
     * User profile information
     * Информация о профиле
     *
     * @return UserResource
     */
    public function me()
    {
        return new UserResource(auth()->user());
    }
}
