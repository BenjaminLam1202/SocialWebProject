
@extends('layouts.app')
@section('content')
<div class="container">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<div class="container">    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Topic</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Topic form</h4>
        </div>
        <div class="modal-body">
            <div>



                <form action="/api/admin/categories/create" method="post" class="my_topic_form" id="my_topic_form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Topic name</label>
                        <input type="text" class="form-control" name="category" aria-describedby="noticeHelp" placeholder="Topic name">
                        <small id="noticeHelp" class="form-text text-muted">Choose your own topic and make people talk about it.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button> 
                </form>
            </div>
            <script type="text/javascript">
                $("#my_topic_form").submit(function(event){
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
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div></div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td><strong>{{$category->category}}</strong></td>
            <td><button class="delete_here" id="delete_here" type="button" data-mid="{{$category->id}}">Delete</button>/<button type="button" data-toggle="modal" data-target="#myModaledit">edit</button></td>

                <div id="myModaledit" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit your topic</h4>
        </div>
        <div class="modal-body">
            <div>



                <form action="/api/admin/categories/{{$category->id}}/update" method="patch" class="my_topic_change_form" id="my_topic_change_form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Remane topic name</label>
                        <input type="text" class="form-control" name="category" aria-describedby="noticeHelp" placeholder="Topic name">
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button> 
                </form>
            </div>
            <script type="text/javascript">
                $("#my_topic_change_form").submit(function(event){
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


            <script type="text/javascript">
$(document).ready(function() {
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $('.delete_here').on('click', function (e) {
        // e.preventDefault();
        var id = $(this).data('mid');
        console.log(id);
        var post_url ='/api/admin/categories/'+id+'/delete';
        console.log(post_url);
        // var id = $(this).attr('data-id');
        
        $.ajax({
            type: "delete",
            url: post_url,
            data: {id: id},
            success: function( msg ) {
              console.log(msg)
            }
        });
    });
});
            
            </script>

            <td>
            <table class="table table-striped">
                <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
        </tr>
    </thead>
            <tbody>
                @foreach($category->posts as $post)
                <tr>
               <div>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
            </div>
        </tr>
         @endforeach
        </tbody>
    </table>
    </td>
    </tr>
    @endforeach
</tbody>
</div>
@endsection