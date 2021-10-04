<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::latest()->get());
    }

    public function show($id)
    {
        $user = User::where('android_id', $id)->first();
        return response(new UserResource($user));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('android_id', $id)->first();
        $user->update($request->all());
        return response(new UserResource($user), Response::HTTP_OK);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response('Delete Data', Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status'    => 'failed'
            ], 401);
        }
        else {
            return response()->json([
                'status' => 'success'
            ], 200);
        };
    }
}
