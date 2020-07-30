<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.manager.role')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
        'name' => ['required', 'unique:categories', 'max:10'],
        ]);

        $role = new Role;
        $role->name = $data['name'];
        $role->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function setrole(Request $request){
    // $role = Role::findOrFail($role);
    // $user = User::findOrFail($user);
    // $user->roles()->attach($role);
    $data = request()->all();
        //dd($data['role'],$data['user']);
    $role = Role::findOrFail($data['role']);
    $user = User::findOrFail($data['user']);
    $user->roles()->attach($role);

  //return Redirect::back();

  }
  public function removerole(Request $request){
    $data = request()->all();
    $role = Role::findOrFail($data['role']);
    $user = User::findOrFail($data['user']);
    $user->roles()->detach($role);


  //return Redirect::back();

  }
}
