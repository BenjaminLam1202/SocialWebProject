<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class UsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 

    public function store(Request $request)
    {
        $data = $request->validate([
             'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $article = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return response()->json($article,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $data = $request->validate([
            'email' => 'email',
        ]);
        $user = $id->update($request->all());
        return response()->json($user,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        $this_user_post = Post::with('user')->where('user_id',$id->id);
        $this_user_post->delete();
        $this_user_comments = Comment::with('user')->where('user_id',$id->id);
        $this_user_comments->delete();
        // $this_user_post = Follower::with('user')->where('user_id',$id->id);
        $follower = DB::table('follower_users')->where('user_id', $id->id);
        $follower->delete();
        $id->delete();

        return response()->json($id,201);
    }
    public function adminarticle()
    {
      $posts = Auth::user()->posts;
      return view('admin.adminarticle')->with('posts',$posts);
  }
}
