
@extends('layouts.app')
@section('content')
<div class="container">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <div>
    <div class="text-center">
      {{ auth()->user()->unreadNotifications->count() }} 




    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Created_at</th>
          <th scope="col">Email</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->email}}</td>
          <td><button type="button" data-toggle="modal" data-target="#myModaluser{{$user->id}}">edit</button>/<button class="delete_here{{$user->id}}" id="delete_here{{$user->id}}" type="button" data-mid="{{$user->id}}">Delete</button></td>
          <div>

           <div id="myModaluser{{$user->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit user's profile</h4>
                </div>
                <div class="modal-body">
                  <div>



                    <form action="/api/admin/user/{{$user->id}}/update" method="patch" class="my_topic_change_form{{$user->id}}" id="my_topic_change_form{{$user->id}}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Remane your name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="noticeHelp" value="{{$user->name}}" placeholder="{{$user->name}}"> 
                        <label for="exampleInputEmail1">Remane email name</label>
                        <input type="email" class="form-control" name="email" aria-describedby="noticeHelp" value="{{ $user->email}}" placeholder="{{$user->email}}" readonly>
                        <label for="exampleInputEmail1">Remane title name</label>
                        <input type="text" class="form-control" name="title" aria-describedby="noticeHelp" value="{{$user->title}}" placeholder="{{$user->title}}">
                        <label for="exampleInputEmail1">Remane des name</label>
                        <input type="text" class="form-control" name="des" aria-describedby="noticeHelp" value="{{$user->des}}" placeholder="{{$user->des}}">
                        <label for="exampleInputEmail1">Remane url name</label>
                        <input type="text" class="form-control" name="url" aria-describedby="noticeHelp" value="{{$user->url}}" placeholder="{{$user->url}}">
                      </div>
                      <button type="submit" class="btn btn-primary">Change</button> 
                    </form>
                  </div>
                  <script type="text/javascript">
                    $("#my_topic_change_form{{$user->id}}").submit(function(event){
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
    $('#delete_here{{$user->id}}').on('click', function (e) {
        // e.preventDefault();
        var id = $(this).data('mid');
        console.log(id);
        var post_url ='/api/admin/user/'+id+'/delete';
        console.log(post_url);
        // var id = $(this).attr('data-id');
        
        $.ajax({
          type: "delete",
          url: post_url,
          data: {id: id},
          success:function(data){

            alert("success!! reload page to see the delete");

          }
        });
      });
  });
  
</script>


</div>
</tr>
@endforeach
</tbody>
</table>




</div>
</div>
@endsection
