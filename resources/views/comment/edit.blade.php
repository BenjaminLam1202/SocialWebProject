
<div class="container">
<form action="/ep/{{$comment->id}}" enctype="multipart/form-data" method="post">
@csrf
 @method('PATCH')


      <div class="">
       comment: {{$comment->des}}
      </div>
      <div class="container">

      <div class="md-form mb-4">
        <i class="fas fa-envelope prefix grey-text"></i>
        <input id="des" type="des" class="form-control{{ $errors->has('des') ? ' is-invalid' : '' }}" name="des" value="{{ old('des')  ?? $comment->des ?? ' '   }}" required>
        <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Comment') }}</label>
      </div>


    <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">Edit</button>
      </div>
    </div>
</form>
</div>