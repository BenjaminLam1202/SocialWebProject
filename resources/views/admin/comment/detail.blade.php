@extends('layouts.app')
@section('content')
<div class="container">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <!--comment do-->
 <div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body"> 
              <button class="delete_here btn btn-primary" id="delete_here" type="button" data-poid="{{$post->id}}" data-comid="{{$comment->id}}">Delete</button>
              @if(Auth::user()->id ==$comment->user_id )

              <a class="btn btn-primary" href="/api/article/detail/post/{{$post->id}}/comment/{{$comment->id}}/edit" > edit</a>
              
              @endif
              <div class="row">

                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    <p class="text-secondary text-center">{{$comment->created_at}}</p>
                </div>
                <div class="col-md-10">
                    <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$comment->user->name}}</strong></a></p>
                    <p>{{$comment->des}}</p>
                    <p>
                        {{"/api/admin/article/detail/post/$post->id/comment/$comment->id/reply"}}
                        
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
      <button class="delete_here btn btn-primary" id="delete_here" type="button" data-poid="{{$post->id}}" data-comid="{{$commentr->id}}">Delete</button>
      @if(Auth::user()->id ==$commentr->user_id )

      <a class="btn btn-primary" href="/ec/{{$commentr->id}}" > edit</a>
      
      @endif
      <div class="row">
        <div class="col-md-2">
            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
            <p class="text-secondary text-center">{{$commentr->created_at}}</p>
        </div>
        <div class="col-md-10">
            <p><a href=""><strong>{{$commentr->user->name}}</strong></a></p>
            <p><a href="/api/article/detail/post/{{$post->id}}/comment/{{$commentr->id}}/detail">{{$commentr->des}}</a></p>
        </div>
    </div>
</div>
</div>

@endforeach
</div>


</div>
</div>  
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

<script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
      $('#delete_here').on('click', function (e) {
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


</div>
@endsection