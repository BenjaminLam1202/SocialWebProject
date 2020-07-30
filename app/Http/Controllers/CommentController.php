<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
      //
  }
  public function store($post){
    $data = request()->validate([
      'des' => 'required',
    ]);
    $post = Post::findOrFail($post);

    $post->comments()->create([
      'des' => $data['des'],
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->back();
  //return Redirect::back();

  }

  public function storeuser($user){
    $data = request()->validate([
      'des' => 'required',
    ]);
    $user = User::findOrFail($user);

    $user->comments()->create([
      'des' => $data['des'],
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->back();
  //return Redirect::back();

  }

  public function delete($comment){
    $comment = Comment::findOrFail($comment);
    if (Auth()->user()->id == $comment->user_id) {
      $comment->delete();
      return redirect()->back();
    }else{
      abort(403, 'Unauthorized action.');
      return redirect('/')->with('status', 'Not Authorized!');
    }
  }
  public function edit(\App\Comment $comment)
  {
    if (Auth()->user()->id == $comment->user_id) {
      return view('comment.edit', compact('comment'));
    } else{
      abort(403, 'Unauthorized action.');
      return redirect('/')->with('status', 'Not Authorized!');
    }
    
  }
  public function update(\App\Comment $comment)
  {
    if (Auth()->user()->id == $comment->user_id) {
      $data = request()->validate([
        'des' => '',
      ]);

      $comment->des = request('des');
      $comment->save();




      return redirect('/');
    } else{
      abort(403, 'Unauthorized action.');
      return redirect('/')->with('status', 'Not Authorized!');
    }
  }
  public function replystore($comment)
  {
    $data = request()->validate([
      'des' => 'required',
    ]);
    $post = Post::findOrFail($comment);
    $commment_parent = $post->comments->where('id',$comid);

    //$comment = Comment::findOrFail($comment);
    $comment->comments()->create([
      'des' => $data['des'],
      'user_id' => auth()->user()->id,
      'parent_id'=>$comment->id
    ]);

    return redirect()->back();
  //return Redirect::back();

  }
}

