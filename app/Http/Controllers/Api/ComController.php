<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($poid,$comid)
    {

        $post = Post::find($poid);
        $comment = Comment::find($comid);
        return view('admin.comment.detail')->with('comment',$comment)->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     *///33,27
    public function edit($poid,$comid)
    {
        $post = Post::findOrFail($poid);
        $comment = Comment::findOrFail($comid);
        $post = Post::findOrFail($poid);
        if (Auth()->user()->id == $comment->user_id)
        {
          return view('admin.comment.edit')->with('comment',$comment)->with('post',$post);
        } 
        else
        {
          abort(403, 'Unauthorized action.');
          return redirect('/')->with('status', 'Not Authorized!');
        }
      
  }


    public function update(Request $request, $poid,$comid)
    {
        $post = Post::findOrFail($poid);
        $comment = Comment::findOrFail($comid);
        if (Auth()->user()->id == $comment->user_id) 
        {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($poid,$comid)
    {

        $post = Post::find($poid);
        $comment = Comment::findOrFail($comid);

        $comment_childs = Comment::all()->where('parent_id',$comment->id);

        foreach ($comment_childs as $comment_child) {
            $comment_child->delete();
        }
        
        $comment->delete();
        response()->json(['response' => 'This is delete method']);
        return redirect()->back();
        
    }
    public function destroyreply($poid,$comid)
    {

        
        $comment = Comment::findOrFail($comid);
        $comment->delete();
        response()->json(['response' => 'This is delete method']);
        return redirect()->back();
        
    }
    public function replystore(Request $request,$poid,$comid)
    {
        $data = request()->validate([
          'des' => 'required',
      ]);
        $post = Post::findOrFail($poid);
        $commment_parent = $post->comments->where('id',$comid);

    //$comment = Comment::findOrFail($comment);
        $post->comments()->create([
          'des' => $data['des'],
          'user_id' => auth()->user()->id,
          'parent_id'=>$commment_parent->first()->id
      ]);

        return redirect()->back();
  //return Redirect::back();

    }
}
