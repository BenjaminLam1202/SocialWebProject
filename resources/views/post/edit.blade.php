@extends('layouts.app')
@section('content')
<div class="container">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <form>
    @csrf
    @method('PATCH')


    <div class="">
     User: {{$post -> Title}}
   </div>
   <div class="container">

    <div class="md-form mb-4">
      <i class="fas fa-envelope prefix grey-text"></i>
      <input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title')  ?? $post->title ?? ' '   }}" required>
      <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Title') }}</label>
    </div>


    <div class="md-form mb-4">
      <i class="fas fa-envelope prefix grey-text"></i>
      <input id="des" type="des" class="form-control{{ $errors->has('des') ? ' is-invalid' : '' }}" name="des" value="{{ old('des')  ??  $post->des ?? ' '  }}" required>
      <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Description')}}</label>
    </div>



    <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default uploadrealpost" data-id ="{{$post->id}}">Post</button>
    </div>
  </div>
</form>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('.uploadrealpost').on('click', function (e) {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
   
        
        e.preventDefault();

        var title = $("input[name=title]").val();

        var des = $("input[name=des]").val();

        var id = $(this).data('id');

        //var category = $("input[name=email]").val();

        console.log(title);        
        console.log(des);        



        $.ajax({

           type:'patch',

           url:'/api/post/'+id,

           data:{title:title, des:des},

           success:function(data){

              alert("success!! reload page to update");

           }

        });

  

      });


  });

</script>
@endsection