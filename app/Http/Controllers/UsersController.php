<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{

    public function index()
    {
      $user = User::all();

      return response()->json($user);
    }

    public function create(Request $request)
    {
        $request['api_token'] = str_random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());

        return response()->json($user);
    }

    public function show($id)
    {
      $user = User::find($id);

      return response()->json($user);
    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->title = $request->title;
      $user->body = $request->body;
      $user->views = $request->views;
      $user->save();

      return response()->json($user);
    }

    public function delete($id)
    {
      $user = User::find($id);
      $user->delete();

      return response()->json('Removed success.');
    }

}
