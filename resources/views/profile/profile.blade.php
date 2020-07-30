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
      <h1>{{$user->name}}</h1>
      <h1>{{$user->number}}</h1>

          @auth
    @if(Auth::user()->id ==$user->id)
<button class="uploadFakeData" id="uploadFakeData" type="button" data-title="{{rand(10,100)}}" data-des="{{rand(10,100)}}" data-category="1">generate fake post{{rand(10,100)}}</button>
@endif
@endauth
  <script type="text/javascript">

$(document).ready(function() {
    $('.uploadFakeData').on('click', function (e) {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
   
        

        var title = $(this).data('title');

        var des = $(this).data('des');

        var category_id = $(this).data('category');

        //var category = $("input[name=email]").val();

        console.log(title);        
        console.log(des);        
        console.log(category);


        $.ajax({

           type:'post',

           url:'/api/post',

           data:{title:title, des:des, category_id:category_id},

           success:function(data){

              alert("success!! reload page to update");

           }

        });

  

      });


  });

</script>

    </div>

    @guest
    <div class="">

    </div>
    @else
    <div class="">

    </div>
    @endguest

    @auth
    @if(Auth::user()->id ==$user->id)
    <div class="">
      <a href="/profile/{{$user->id}}/edit">edit </a>
    </div>
    @else

    <!--follow-->


    <div>

      @if(Auth::user()->followers()->where([['user_id',Auth::user()->id],['follower_id',$user->id]])->get() == "[]")
      <div> <a href="/f/{{$user->id}}" type="button" class="btn btn-primary" name="button">Follow </a>
      </div>
      @else
      <div> <a href="/uf/{{$user->id}}" type="button" class="btn btn-primary" name="button">UnFollow </a>
      </div>
      @endif
    </div>
    





    <!--follow-->




    @endif
    @else
    <div class="">

    </div>
    @endauth


    <div class="d-flex">
      <div class="font-weight-bold">{{$user->title}}</div>
      <hr>
      <div><p>da like :{{$user->reactions->count()}}</p></div>
      <div><p> || like nhan duoc: {{DB::table('posts')->join('reactions', 'reactions.post_id', '=', 'posts.id')->where('posts.user_id', $user->id)->get()->count()}}</p> </div>


      <div>{{$user->des}}</div>
      <hr>
      <div><a href="#">{{$user->url}}</a></div>
      <hr>
      @guest
      <div class="">

      </div>
      @else
      <div class="">

      </div>
      @endguest

      @auth
      @if(Auth::user()->id ==$user->id)
      <div class="pt-5">
        <button href="/p/create" type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalLoginForm"> New Post </button>
      </div>
      @endif
      @else
      <div class="">

      </div>
      @endauth
    </div>
  </div>
</div>
@foreach ($user->posts as $post)

@endforeach

<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Category</th> 
      <th>Edit</th> 
      <th>Status</th> 
    </tr>
  </thead>
  <tbody>
    @foreach($user->posts as $post)
    <tr>
      <div>
        <td><a  href="/api/article/detail/post/{{$post->id}}">{{$post->title}}</a></td>
      </div>

      <td>{{$post->des}}</td>
      <td>{{$post->category->category}}</td>
      @auth
      @if(Auth::user()->id ==$user->id)
{{--       <td><button class="delete_video" id="delete_video" type="button" data-mid="{{$post->id}}">Delete{{$post->id}}</button>/<a href="/d/{{$post->id}}" > delete</a>/<a href="/profile/po/{{$post->id}}/edit" > edit</a></td>
 --}}
      <td class="text-center"><a class='btn btn-info btn-xs' href="/profile/po/{{$post->id}}/edit"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class="btn btn-danger btn-xs delete_video" id="delete_video" type="button" data-mid="{{$post->id}}"><span class="glyphicon glyphicon-remove"></span> Del</a></td>



      @endif

      <div>
        <script type="text/javascript">
$(document).ready(function() {
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $('.delete_video').on('click', function (e) {
        // e.preventDefault();
        var id = $(this).data('mid');
        console.log(id);
        // var id = $(this).attr('data-id');
        
        $.ajax({
            type: "delete",
            url: '/api/post/'+id,
            data: {id: id},
            success: function( msg ) {
              console.log(msg)
            }
        });
    });
});

  </script>

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




<table class="table table-striped">
  <thead>
    <tr>
      <th>Description</th>
      <th>Name</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>

    @foreach($user->followers as $follower)
    @foreach(App\User::find($follower->id)->posts as $post)
    <tr>
      <div>
        <td><a href="/api/article/detail/post/{{$post->id}}">{{$post->title}}</a></td>

      </div>

      <td>{{$post->des}}</td>
      <td>{{$post->user()->get()->first()->name}}</td>

      @auth
      @if(Auth::user()->id ==$user->id)
      <td><button class="delete_video" id="delete_video" type="button" data-mid="{{$post->id}}">Delete</button>/<a href="/d/{{$post->id}}" > delete</a>/<a href="/profile/po/{{$post->id}}/edit" > edit</a></td>




      @endif

      <div>

        @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
        <td><a href="/l/{{$post->id}}" >like</a></td>
        @else
        <td><a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" >dislike</a></td>
        @endif
      </div>
      @endauth
    </tr>
     @if($loop->index==10)
        @break;
    @endif
    
    @endforeach

    @endforeach
  </tbody>
</table>




<hr>
<!--comment-->


@foreach ($user->comments as $comment) 
<div class="container">
 <div class="row">
  <div class="col">
    <p>{{$comment->user->name}} : {{$comment->des}}</p>
  </div>
  @auth
  <div class="col">
    @if(Auth::user()->id ==$comment->user_id )

    <td><a href="/cd/{{$comment->id}}" > delete</a><a href="/ec/{{$comment->id}}" > edit</a></td>
    @endif
  </div>
</div>
<td>
  @foreach ($comment->where('parent_id',$comment->id)->get() as $commentr) 
  <div class="container">
   <div class="row">
    <div class="col">
      <p>{{$commentr->user->name}} replied : {{$commentr->des}}</p>
      @auth
      @if(Auth::user()->id ==$commentr->user_id )
    </div>
    <div class="col">
      <a href="/cd/{{$commentr->id}}" > delete</a><a href="/ec/{{$commentr->id}}" > edit</a>
    </div>
  </div>  

  @endif

  @endauth
</div>
@endforeach

</td>

<form action="/cc/{{$comment->id}}" enctype="multipart/form-data" method="post">
@csrf

<div class="row">
  <div class="col">
    <div class="md-form mb-5">
      <input type="text" name="des" id="des" value="{{ old('des') }}" class="form-control" placeholder="Reply to {{$comment->user->name}}" required>
    </div>
  </div>
  <div class="col">
   <button class="btn btn-default">Reply</button>
 </div>
</div>
</form>
</tr>

@endauth
@endforeach
</div>


@auth

<form action="/cu/{{$user->id}}" enctype="multipart/form-data" method="post">
@csrf


<!--comment post-->
<div class="row">
  <div class="col">
    <div class="md-form mb-5">
      <input type="text" name="des" id="des" value="{{ old('des') }}" class="form-control" placeholder="Comment to {{$user->name}}'s' profile" required>
    </div>
  </div>
  <div class="col">
   <button class="btn btn-default">Comment</button>
 </div>
</div>
</form>


<!--comment-->
@endauth







@endsection