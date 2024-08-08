<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\AuthApiRequest;
use App\Http\Resources\UserResource;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }
    public function auth(AuthApiRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user->tokens()->delete();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(['token' => $token]);
    }
    public function me() {
        $user = Auth::user();
        return new UserResource($user);
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
