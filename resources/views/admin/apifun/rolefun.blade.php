<div class="container">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <form action="/api/admin/role/make" method="post" class="my_role_form" id="my_role_form">
 	 @csrf

  <div class="modal fade" id="modalRoleForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-left">
        <h4 class="modal-title w-100 font-weight-bold">New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Name') }}</label>
          @if ($errors->has('title'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Name') }}</strong>
          </span>
          @endif
        </div>

     
     </div>
     <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">Create</button>
    </div>
  </div>
</div>
</div>
                  </form>
                   <script type="text/javascript">
$("#my_role_form").submit(function(event){
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



{{-- </div>
</div>

<div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="name" aria-describedby="noticeHelp"  placeholder="input name"> 
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" name="email" aria-describedby="noticeHelp" placeholder="input email" >
                      <label for="exampleInputEmail1">Password</label>                      <input type="password" class="form-control" name="password" aria-describedby="noticeHelp"  placeholder="input password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>  --}}