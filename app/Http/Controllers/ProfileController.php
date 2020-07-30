<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index($user)
  {
    $user = User::findOrFail($user);
    return view('profile.profile',[
      'user' => $user,
    ]);
  }

  public function edit(\App\User $user)
  {
    
    if (Auth()->user()->id == $user->id)
    {
      return view('profile.edit', compact('user'));
    } else{
      abort(403, 'Unauthorized action.');
      return redirect('/')->with('status', 'Not Authorized!');
    }
  }

  public function update(\App\User $user)
  {
    if (Auth()->user()->id == $user->id)
    {
      $data = request()->validate([
        'title' =>'',
        'des' => '',
        'url' => 'url',
      ]);


      $user->title = request('title');
      $user->des = request('des');
      $user->url = request('url');
      $user->save();



      return redirect("/profile/{$user ->id}");
    } else{
      abort(403, 'Unauthorized action.');
      return redirect('/')->with('status', 'Not Authorized!');
    }
  }
}
