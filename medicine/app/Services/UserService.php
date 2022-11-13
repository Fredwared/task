<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    const DEFAULT_TTL = 60 * 10; // 10 minute

    /**
     * @param string $token
     * @return mixed
     */
    public function authorize(string $token): array
    {
        return Cache::get("user:{$token}", $this->getUser($token));
    }

    /**
     *
     * @param string $token
     * @return array
     */
    protected function getUser(string $token): array
    {
        $baseUrl = config('services.oauth.host');
        try {
            $request = Http::baseUrl($baseUrl)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => "{$token}"
                ])->get('/api/me');

            $user = $request->json('data');

            if ($user) {
                cache()->put("user:{$token}", $user, self::DEFAULT_TTL);

                return $user;
            }
            return [];
        } catch (Exception $exception) {
            Log::warning("Authorization error {$token}", [
                'message' => $exception->getMessage()
            ]);
            return [];
        }
    }
}
