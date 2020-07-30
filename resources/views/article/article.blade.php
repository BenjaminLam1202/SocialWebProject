@extends('layouts.app')
@section('content')




<!--here-->
<div class="container">
 @foreach ($posts as $post)
 <div class="well">
  <div class="media">
    <a class="pull-left" href="#">
    </a>
    <div class="media-body">
      <div class="text-center">
        <div class="row">
          <div class="col-sm-9">
            <h3 class="pull-left"><a href="/api/article/detail/post/{{ $post->id }}">{{ $post->title }}</a></h3>
          </div>
          <div class="col-sm-3">
            <h4 class="pull-right">
              <small><em>{{ $post->created_at }} </em></small>
            </h4>
          </div>
        </div>
      </div>
      <p class="text-right"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
      <p>{{ $post->des }}</p>
      <ul class="list-inline list-unstyled">
        <li>

          @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
          <span><i class="glyphicon glyphicon-calendar"></i><a href="/l/{{$post->id}}" >like</span></li>
            @else
            <span><i class="glyphicon glyphicon-calendar"></i><a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" >dislike</span></li>
              @endif


              <li>|</li>
              <span><i class="glyphicon glyphicon-comment"></i>{{App\Comment::all()->where('commentable_id',$post->id)->count()
            }}</span>
            
          </ul>
        </div>
      </div>
    </div>
    <hr>
    @endforeach
  </div>





  {{ $posts->links() }}
  <!--here-->
  @endsection