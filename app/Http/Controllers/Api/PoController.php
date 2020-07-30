<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\Po as PoResource;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BrNotification;
class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {
    //   $post = $this->removeRS($post);
    //   $post = Post::all()->where('title',$post);
    //   dd( $post);
    //   return view('post.show',[
    //     'post' => $post,
    // ]);
        //$post = Crypt::decrypt($post);
        $post = Post::findOrFail($post);
        return view('post.show')->with('post',$post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $title = $this->addSR($request->get('title'));
        // $data = $request->except(['title']);
        // $data['title'] = $title;
        $article = auth()->user()->posts()->create($request->all());
        auth()->user()->notify(new BrNotification($article));
        return response()->json($article,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::findOrFail($id);
       return view('post.show',[
        'post' => $post,
    ]);
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
        $post = Post::findOrFail($id);
        $article = $post->update($request->all());
        return response()->json($article,201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return response()->json(['response' => 'This is delete method']);
    }

    public function addSR($string)
    {
        $string=mb_str_split($string);
        $line3="";
        foreach ( $string as $val ) { 
         if ( $val == " " ) $val = "_"; 
         $line3=$line3.$val;

     } 
     return $line3;
     }
     public function removeRS($string)
     {
        $string=mb_str_split($string);
        $line3="";

        foreach ( $string as $val ) { 
         if ( $val == "_" ) $val = " "; 
         $line3=$line3.$val;

    } 
     return $line3;
    }
    public function fake($user)
    {

        $user = User::findOrFail($user);
        return view('generator.dashboard')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function article()
    {

        $posts= Post::paginate(10);

        return view('article.article')->with('posts',$posts);
    }   
     public function social()
    {

        $posts= Post::orderBy('id', 'desc')->paginate(10);

        return view('article.social')->with('posts',$posts);
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        return view('article.detail')->with('post',$post);
    }
    public function detailadmin($poid)
    {
        $post = Post::findOrFail($poid);
        return view('admin.article.detail')->with('post',$post);
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }
}


