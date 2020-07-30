<?php

namespace App\Http\Controllers;
use App\Follower;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FollowUsercontroller extends Controller
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
  public function follower($follower){
    $follower = User::findOrFail($follower);
    Auth()->user()->followers()->attach($follower);

    return redirect()->back();

  //return Redirect::back();

  }
  public function unfollower($follower){
    $follower = User::findOrFail($follower);
    Auth()->user()->followers()->detach($follower);
    
    return redirect()->back();

  //return Redirect::back();

  }


}
