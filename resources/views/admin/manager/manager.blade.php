
@extends('admin.layout.menu')
@extends('admin.apifun.userfun')
@section('contenter')
 <div class="pt-5">
        <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalRegisterForm"> New User </button>
      </div>
      <div class="text-center">

        
      </div>  
<table class="table table-striped">

  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Created_at</th>
      <th scope="col">Email</th>
      <th scope="col">nitify</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->email}}</td>
      <td class="text-center"><button type="button" class='btn btn-info btn-xs' data-toggle="modal" data-target="#myModaluser{{$user->id}}"><span class="glyphicon glyphicon-edit"></span>edit</button>
      @if(Auth::user()->id != $user->id)
        <button class="delete_here{{$user->id}} btn btn-danger btn-xs" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" id="delete_here{{$user->id}}" type="button" data-mid="{{$user->id}}"><span class="glyphicon glyphicon-remove"></span>Del</button>
      @endif
      </td>
      <td>        
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
<div class="text-center">
  @foreach($notifications as $notification)
        <div class="alert alert-success" role="alert">
            {{ $notification }} has just registered.
            <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                Mark as read
            </a>
        </div>

        @if($loop->last)
            <a href="#" id="mark-all">
                Mark all as read
            </a>
        @endif
    @endforeach

</div>
@endsection