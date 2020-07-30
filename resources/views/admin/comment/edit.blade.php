@extends('layouts.app')
@section('content')
<div class="container">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


 <form action="/api/article/detail/post/{{$post->id}}/comment/{{$comment->id}}/update" method="patch" class="my_comment_form" id="my_comment_form">
  @method('PATCH')
  <div class="form-group">
   <label class="col-md-4 control-label" for="ppa">Edit your comment</label>  
   <div class="col-md-4">
    <input id="des" name="des" type="text" placeholder="{{$comment->des}}" class="form-control input-md" required="">
    
    
  </div>
  <button type="submit" class="btn btn-primary">Create</button> 
</form>
</div>
<script type="text/javascript">
  $(".my_comment_form").submit(function(event){
   $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    
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












</div>
@endsection