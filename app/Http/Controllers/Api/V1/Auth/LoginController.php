<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends Controller
{
    /**
     * @OA\POST(
     *      path="/api/v1/login",
     *      operationId="authLogin",
     *      tags={"Auth"},
     *      summary="Sign in",
     *      description="Login by email, password",
     *      @OA\RequestBody(
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="access_token", type="string", example="1|0HpPOk1fnQoyQVZJLZmPXwzcYdqDwkaH8Tzb8vKa")
     *          )
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="The provided credentials are incorrect",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="The provided credentials are incorrect")
     *          )
     *       )
     *     )
     */

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect',
            ], 422);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
        ]);
    }
}
