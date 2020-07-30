<?php

namespace App\Http\Controllers;
use App\Post;
use App\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
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
  public function like($post){
    $post = Post::findOrFail($post);
    $post->reactions()->create([
    'user_id' => auth()->user()->id,
  ]);

 return redirect()->back();


  //return Redirect::back();

}

 public function delete($reaction)
{
  $reaction = Reaction::findOrFail($reaction);
  $reaction->delete();
  return redirect()->back();
  
}

}
