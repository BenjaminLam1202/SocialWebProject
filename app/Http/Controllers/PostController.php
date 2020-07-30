<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Exports\PostExport;
use App\Imports\PostImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BrNotification;
  class PostController extends Controller
  {
    public function _construct()
    {
      $this->middleware('auth');
    }
    public function index($post)
    {
      $post = Post::findOrFail($post);
      return view('post.show',[
        'post' => $post,
      ]);
    }
    public function create()
    {
      return view('post.create');
    }
    public function store(){
      $data = request()->validate([
        'title' => 'required',
        'des' => 'required',
        'category' => 'required',
      ]);

      auth()->user()->posts()->create([
        'title' => $data['title'],
        'des' => $data['des'],
        'category_id' => $data['category'],
      ]);

      auth()->user()->notify(new BrNotification($data));
      return redirect()->back();

    }
    public function show(\App\Post $post)
    {
      return view('post.show',[
        'post' => $post,
      ]);
    }

    public function delete($post)
    {
      
      $post = Post::findOrFail($post);
      if(auth::user()->roles()->first() != null){
      if (Auth()->user()->id == $post->user_id || auth::user()->roles->first()->name == "admin" || auth::user()->username == "Lam Thai Gia Huy") {
        $post->delete();
        return redirect()->back();
      } else{
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
      }
    }else if(auth::user()->username != "Lam Thai Gia Huy"){
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
    }else{
         $post->delete();
        return redirect()->back();
    }


  }

    public function edit(\App\Post $post)
    {
      
      if (Auth()->user()->id == $post->user_id) {
        return view('post.edit', compact('post'));
      } else{
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
      }
    }

    public function update(\App\Post $post)
    {
     
      if (Auth()->user()->id == $post->user_id) {
        $data = request()->validate([
          'title' =>'',
          'des' => '',
        ]);


        $post->title = request('title');
        $post->des = request('des');
        $post->save();




        return redirect("/profile/{$post->user ->id}");
      } else{
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
      }
    }
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new PostExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new PostImport,request()->file('file'));
           
        return back();
    }

  }
?>