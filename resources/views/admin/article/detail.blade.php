@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container-fluid">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <div class="panel-heading">

            <h3>{{$post->user->name}}</h3>
            <h5><span>{{$post->title}}</span> - <span>{{$post->created_at}}</span>   


                @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
                <a href="/l/{{$post->id}}" class="float-right btn text-white btn-secondary"> <i class="fa fa-heart"></i> Like</a>
                @else
                <a class="float-right btn text-white btn-danger" href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" > <i class="fa fa-heart"></i> Dislike</a>
                @endif

            </div>
            <div class="panel-body">
                <p>{{$post->des}}</p>
            </div>
            <div class="panel-footer">
                <button type="button" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-share-alt ]"></span>
                </button>
                <div class="input-placeholder">Add a comment...</div>
            </div>
            <form action="/c/{{$post->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="panel-google-plus-comment">

                    <div class="panel-google-plus-textarea">
                        <input type="text" name="des" id="des" value="{{ old('des') }}" class="form-control" placeholder="Comment to {{$post-> title}}" required>
                        <br>
                        <button id="send" style="border-radius: 30px;cursor: pointer;outline: none;box-shadow: 0 0 0 2px #4267b2;border: 0;"><i class="fa fa-commenting-o" style="font-size: 18px; "></i> POST</button>

                    </div>

                </div>

            </form>
        </div>
        <br>
        <!--comment do-->
        <div class="container">
            @foreach ($post->comments as $comment) 
            <div class="container">
                <div class="card">
                    <div class="card-body"> 
                        <button class="delete_here btn btn-primary" id="delete_here" type="button" data-poid="{{$post->id}}" data-comid="{{$comment->id}}">Delete</button>
                        <script type="text/javascript">
                            $(document).ready(function() {
                              $.ajaxSetup({

                                headers: {

                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                }

                            });
                              $('.delete_here').on('click', function (e) {
        // e.preventDefault();
        var poid = $(this).data('poid');
        console.log(poid);
        var comid = $(this).data('comid');
        console.log(comid);
        var post_url ='/api/admin/article/detail/post/'+poid+'/comment/'+comid+'/delete';
        console.log(post_url);
        // var id = $(this).attr('data-id');
        
        $.ajax({
            type: "delete",
            url: post_url,
            success: function( msg ) {
              console.log(msg)
          }
      });
    });
                          });

                      </script>
                      @if(Auth::user()->id ==$comment->user_id )

                      <a class="btn btn-primary" href="/ec/{{$comment->id}}" > edit</a>
                      
                      @endif
                      <div class="row">

                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">{{$comment->created_at}}</p>
                        </div>
                        <div class="col-md-10">
                            <p><a href="#"><strong>{{$comment->user->name}}</strong></a></p>
                            <p><a href="/api/admin/article/detail/post/{{$post->id}}/comment/{{$comment->id}}/detail">{{$comment->des}}</a></p>
                            <p>
                                <form action="/api/admin/article/detail/post/{{$post->id}}/comment/{{$comment->id}}/reply" class="my_reply_form" id="my_reply_form"  method="post">
                                    @csrf
                                    <div class="panel-google-plus-comment">

                                        <div class="panel-google-plus-textarea">
                                            <input type="text" name="des" id="des" value="{{ old('des') }}" class="form-control" placeholder="Reply to {{$comment->user->name}}" required>
                                            <br>
                                            <button type="submit" style="border-radius: 30px;cursor: pointer;outline: none;box-shadow: 0 0 0 2px #4267b2;border: 0;"><i class="fa fa-reply"></i> Reply</button>

                                        </div>

                                    </div>

                                </form>
                                <script type="text/javascript">
                                    $("#my_reply_form").submit(function(event){
                                       $.ajaxSetup({

                                        headers: {

                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                        }

                                    });
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    console.log(request_method);
    console.log(form_data);
    console.log(post_url);
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data, 
        success:function(data){

          alert("success!! reload page to update");

      }
    }).done(function(response){ //
        $("#server-results").html(response);
    });
});
</script>
</p>
</div>
</div>
@foreach ($comment->where('parent_id',$comment->id)->get() as $commentr) 

<div class="card card-inner">
    <div class="card-body">
        <button class="delete_reply btn btn-primary" id="delete_reply" type="button" data-poid="{{$post->id}}" data-comid="{{$commentr->id}}">Delete</button>

        @if(Auth::user()->id ==$commentr->user_id )

        <a class="btn btn-primary" href="/ec/{{$commentr->id}}" > edit</a>
        <script type="text/javascript">
            $(document).ready(function() {
              $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
              $('.delete_reply').on('click', function (e) {
        // e.preventDefault();
        var poid = $(this).data('poid');
        console.log(poid);
        var comid = $(this).data('comid');
        console.log(comid);
        var post_url ='/api/admin/article/detail/post/'+poid+'/comment/'+comid+'/deletereply';
        console.log(post_url);
        // var id = $(this).attr('data-id');
        
        $.ajax({
            type: "delete",
            url: post_url,
            success: function( msg ) {
              console.log(msg)
          }
      });
    });
          });

      </script>
      @endif
      <div class="row">
        <div class="col-md-2">
            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
            <p class="text-secondary text-center">{{$commentr->created_at}}</p>
        </div>
        <div class="col-md-10">
            <p><a href="#"><strong>{{$commentr->user->name}}</strong></a></p>
            <p><a href="/api/article/detail/post/{{$post->id}}/comment/{{$commentr->id}}/detail">{{$commentr->des}}</a></p>
        </div>
    </div>
</div>
</div>

@endforeach
</div>


</div>
</div>  
@endforeach
</div>
<!--comment do-->



<footer>
    <p>Tags: 
        <a href="/api/admin/categories/{{$post->category->id}}"><span class="label label-info">{{$post->category->category}}</span></a> 
        | <i class="icon-user"></i> <a href="#">{{$post->user->name}}</a> 
        | <i class="icon-calendar"></i> {{$post->created_at}}
        | <i class="icon-comment"></i> <a href="#">{{App\Comment::all()->where('commentable_id',$post->id)->count()}}</a>
    </p>
</footer>




</div>
@endsection
