<div class="container">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <form action="/api/admin/user/create" method="post" class="my_user_form" id="my_user_form">
 	 @csrf

  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Username') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Username') }}</strong>
          </span>
          @endif
        </div>
<div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Email') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Email') }}</strong>
          </span>
          @endif
        </div>

		<div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Password') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Password') }}</strong>
          </span>
          @endif
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Password') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Password') }}</strong>
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
</div>
                  </form>
</div>

 <script type="text/javascript">
$("#my_user_form").submit(function(event){
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

      }
  }).done(function(response){ //
    $("#server-results").html(response);
  });
});
</script>


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