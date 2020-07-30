@extends('admin.layout.menu')
@extends('admin.apifun.rolefun')
@section('contenter')
{{$users}}
<div class="container-fluid">
 <div class="pt-5">
        <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalRoleForm"> New Role </button>
      </div>
<table class="table table-striped">

  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Created_at</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Choose</th>
      <th scope="col">Save</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->email}}</td>
      <td>
      	<ul>
      		@foreach($user->roles as $role)
      		<li>{{$role->name}}</li>
      		@endforeach
      	</ul>
      </td>
      <td class="text-center">
      	           	@if($user->roles()->first() != null)
           	<div></div>
           	@else
      	<form action="/api/admin/role/create" method="post" class="my_form_role{{$user->id}}" id="my_form_role{{$user->id}}">
      		@csrf
      		<input type="text" value="{{$user->id}}" id="user" name="user" hidden>
      	<select id="role" type="role" name="role" class="browser-default custom-select">
            @foreach(App\Role::all() as $role)
           <option value="{{$role->id}}">{{$role->name}}</option>
           @endforeach
         </select>
         <td><div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">Save</button></td>
    </div>
     </form>

           @endif
           	@if($user->roles()->first() == null)
           	<div></div>
           	@else
      	<form action="/api/admin/role/remove" method="post" class="my_remove_role{{$user->id}}" id="my_remove_role{{$user->id}}">
      		@csrf
      		<input type="text" value="{{$user->id}}" id="user" name="user" hidden>
      	<select id="role" type="role" name="role" class="browser-default custom-select">
            @foreach(App\Role::all() as $role)
           <option value="{{$role->id}}">{{$role->name}}</option>
           @endforeach
         </select>
         <td><div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">Remove</button></td>
    </div>
     </form>

 </td>
      @endif
 </td>

</div>

 
                <script type="text/javascript">
                  $("#my_form_role{{$user->id}}").submit(function(event){
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
      	window.history.go(0);
        alert("success!! reload page to update");

      }
    }).done(function(response){ //
      $("#server-results").html(response);
      
    });
  });
</script>

                <script type="text/javascript">
                  $("#my_remove_role{{$user->id}}").submit(function(event){
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
      	window.history.go(0);
        alert("success!! reload page to update");

      }
    }).done(function(response){ //
      $("#server-results").html(response);
      
    });
  });
</script>





</div>
</tr>
@endforeach
</tbody>
</table>
{{ $users->links() }}
@endsection