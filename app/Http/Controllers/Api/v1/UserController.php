<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     tags={"Usuarios"},
     *     summary="Register a new user",
     *     description="Register a new user and return an access token",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="name", type="string"),
     *                  @OA\Property(property="email", type="string", format="email"),
     *                  @OA\Property(property="password", type="string", format="password"),
     *                  @OA\Property(property="password_confirmation", type="string", format="password"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User registered successfully",
     *          @OA\Property(property="token", type="string", example="access_token_here")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Validation error"
     *     )
     * )
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'User registered successfully.'], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/login",
     *     tags={"Usuarios"},
     *     summary="User login",
     *     description="Login with email and password and return an access token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="email", type="string", format="email"),
     *                 @OA\Property(property="password", type="string", format="password")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", example="accessToken")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Name or password incorrect.")
     *         )
     *     )
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Name or password incorrect.'], 401);
        }
    }
    /**
     * @OA\Post(
     *     path="/api/v1/logout",
     *     tags={"Usuarios"},
     *     summary="User logout",
     *     description="Revoke the user's access token to logout",
     *     security={{"BearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Logout successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Logout successfully.")
     *         )
     *     )
     * )
     */
    public function logout()
    {
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json(['message' => 'Logout successfully.'], 200);
    }
}
