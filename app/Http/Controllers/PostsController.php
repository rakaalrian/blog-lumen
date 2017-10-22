<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
      $post = Post::all();

      return response()->json($post);
    }

    public function create(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post);
    }

    public function show($id)
    {
      $post = Post::find($id);

      return response()->json($post);
    }

    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      $post->title = $request->title;
      $post->body = $request->body;
      $post->views = $request->views;
      $post->save();

      return response()->json($post);
    }

    public function delete($id)
    {
      $post = Post::find($id);
      $post->delete();

      return response()->json('Removed success.');
    }

}
