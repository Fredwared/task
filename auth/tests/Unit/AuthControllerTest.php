<?php

namespace Tests\Unit;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseTransactions;


    public function test_successful_login()
    {
        /** @var User $user */
        $user = User::query()->inRandomOrder()->first();

        $request = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $request->assertSuccessful();

        $request->assertJsonStructure([
            'data' => [
                'name',
                'email',
                'access_token'
            ]
        ]);
    }


    public function test_successful_register()
    {
        $requestData = [
            'email' => fake()->email,
            'name' => fake()->name,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $request = $this
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->post(route('register'), $requestData);

        $request->assertSuccessful();

        $user = User::query()->where('email', '=', $requestData['email'])->first();

        $this->assertTrue($user->exists());
    }


    public function test_get_authenticated_user_data()
    {
        $user = User::query()->inRandomOrder()->first();

        $requestData = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $request = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post(route('login'), $requestData);

        $request->assertSuccessful();

        $response = $request->json('data');

        $token = $response['access_token'];

        $request = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$token}"
        ])->get(route('me'));

        $request->assertSuccessful();

        $response = $request->json('data');

        $this->assertTrue($user->email === $response['email']);
    }

    public function test_user_logout()
    {
        $user = User::query()->inRandomOrder()->first();

        $requestData = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $request = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post(route('login'), $requestData);

        $request->assertSuccessful();

        $response = $request->json('data');

        $token = $response['access_token'];

        $bearer = "Bearer {$token}";

        $logoutRequest = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $bearer
        ])->post(route('logout'));

        $logoutRequest->assertSuccessful();

        $this->assertTrue($user->tokens()->count() === 0);
    }
}
