<?php

namespace App\Services;

use App\Http\Controllers\Api\AuthController;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

/**
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    /**
     * Handle an authentication attempt.
     *
     * Обработка попытки аутентификации
     *
     * @param array $validated
     * @return mixed
     * @throws ValidationException
     */
    public function login(array $validated)
    {
        $user = User::query()->where(AuthController::USERNAME, $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                AuthController::USERNAME => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user;
    }


    /**
     * Регистрация пользователя
     *
     * @param array $validated
     * @return Builder|Model
     */
    public function register(array $validated)
    {
        $uuid = Str::uuid()->toString();
        $validated['uuid'] = $uuid;
        return User::query()->create($validated);
    }

    /**
     * Logout
     * Выйти
     *
     * @return bool
     */
    public function logout(): bool
    {
        /** @var User $user */
        $user = auth()->user();

        $user->currentAccessToken()->delete();

        return true;
    }
}
