<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        if($request->hasFile('image')){
            $foto  = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('img', $foto);

            $user->update([
                'image' => $foto
            ]);
        };
        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('android_id', $id)->first();
        $image = $user->image;
        $user->update($request->all());
        
        if($request->hasFile('image')){
            File::delete(public_path().'/storage/img/'.$image);
            
            $foto  = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('img', $foto);
            
            $user->update([
                'image' => $foto
            ]);
        };
        
        return response(new UserResource($user), Response::HTTP_OK);
    }

    public function destroy(User $user)
    {
        if($user->image){
            // dd(public_path().'/storage/img/'.$user->image);
            File::delete(public_path().'/storage/img/'.$user->image);
        };

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
