<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = user::all();
        return response()->json($users);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|max:30'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {

        $this->validate($request, [

            'civility' => 'required',
            'lastname' => 'string|max:64',
            'firstname' => 'string|max:64',
            'birth_date' => 'date|max:64',
            'address' => 'string|max:128',
            'email' => 'email|max:64',
            'picture' => 'string'

        ]);
        $user = User::where('id',$id)->first();

        $user->update($request->all());
        return response()->json('updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkUser(Request $request, int $id)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('id', $id)->first();

        if($user->email === $request->email)
        {
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'status' => true,
                    'message' => 'User Found',
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Wrong Password',
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Wrong Email',
            ]);

        }
    }

    public function updatePassword(Request $request, int $id)
    {
        $this->validate($request, [
            'newPassword' => 'required',
        ]);
        $user = User::where('id', $id)->first();
        $user->update([
            'password' => Hash::make($request->newPassword)]);
            return response()->json([
                'status' => true,
                'message' => 'Updated password',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return response()->json('User '.$id.' deleted!');
    }

    public function findUser(Request $request)
    {
        $token = $request->token;
        $response = SanctumPersonalAccessToken::findToken($token);
        return User::where('id',$response->tokenable_id)->firstOrFail();
    }

    public function checkToken(Request $request)
    {
        $token = $request->token;
        $response = SanctumPersonalAccessToken::findToken($token);
        if($response != null){
            return response()->json([
                'status' => true,
                'message' => 'user authenticated'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'user logged out'
            ]);
        }
    }
}
