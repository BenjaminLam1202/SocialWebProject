<?php

namespace App\Http\Controllers;

use App\Charts\AdminChart;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use Auth;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        $notifications = Auth()->user()->unreadNotifications;
        return view('admin.manager.manager')->with('users',$users)->with('notifications',$notifications);
    }
    public function articlemanager()
    {
        
        $posts= Post::paginate(10);

        return view('admin.manager.article')->with('posts',$posts);
    }     
    public function dashboard()
    {
        $data = array(
            "chart" => array(
                "labels" => ["First", "Second", "Third"]
            ),
            "datasets" => array(
                array("name" => "Sample 1", "values" => array(10, 3, 7)),
                array("name" => "Sample 2", "values" => array(1, 6, 2)),
            )
        );
        
        return view('admin.manager.dashboard')->with('data',$data);
    }
    
    public function category()
    {
        $cat = Category::with('posts')->get();
        return view('admin.manager.category')->with('categories',$cat);
    }
    public function role()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.manager.role')->with('users',$users);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    
    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

}
