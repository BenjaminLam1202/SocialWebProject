
@extends('layouts.app')
@extends('post.create')

@section('content')
<div class="container">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <div class="row">
    <div class="col-3 p-5">
      <h1></h1>
    </div>
    <div class="col-5 pt-5">
      <div class="d-flex justify-content-between align-items-baseline">
        <h1>{{Auth::user()->name}}</h1>

        

      </div>

      
      @guest
      <div class="">

      </div>
      @else
      <div class="">

      </div>
      @endguest

      @auth
      <div class="pt-5">
        <button href="/p/create" type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalLoginForm"> New Post </button>
      </div>
      @else
      <div class="">

      </div>
      @endauth
    </div>
  </div>
</div>


<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Category</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <div>
        <td><a  href="/api/admin/article/detail/post/{{ $post->id }}">{{$post->title}}</a></td>
      </div>

      <td>{{$post->des}}</td>
      <td>{{$post->category->category}}</td>
      @auth
      
      <td><a href="/d/{{$post->id}}" > delete</a>/<a href="/profile/po/{{$post->id}}/edit" > edit</a></td>





      

      @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
      <td><a href="/l/{{$post->id}}" >like</a></td>
      @else
      <td><a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" >dislike</a></td>
      @endif
    </div>


    @else
    <td></td>
    @endauth
  </tr>
  @endforeach
</tbody>
</table>



<!--hien10baidangcuauservuafollow---->



<!--comment-->




<!--comment-->








@endsection
