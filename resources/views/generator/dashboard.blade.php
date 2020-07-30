@extends('layouts.app')
@section('content')
<div class="container">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<div class="row justify-content-center">
	@if(Auth::user()->id ==$user->id)
<button class="uploadFakeData" id="uploadFakeData" type="button" data-title="xong roi ne" data-des="{{rand(10,100)}}" data-category="kid">generate fake post{{rand(10,100)}}</button>
@endif
 <script type="text/javascript">

$(document).ready(function() {
    $('.uploadFakeData').on('click', function (e) {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
   
        

        var title = $(this).data('title');

        var des = $(this).data('des');

        var category = $(this).data('category');

        //var category = $("input[name=email]").val();

        console.log(title);        
        console.log(des);        
        console.log(category);


        $.ajax({

           type:'post',

           url:'/api/post',

           data:{title:title, des:des, category:category},

           success:function(data){

              alert("success!! reload page to update");

           }

        });

  

      });


  });

</script>

<div>
	<form action="/api/post" method="post" class="my_form" id="my_form">
    <label>title</label>
    <input type="text" name="title" required />
    <label>des</label>
    <input type="text" name="des" required/>
    <label>category</label>
    <select name="category" required>
           <option value="kid">kid</option>
           <option value="millennials">millennials</option>
           <option value="adult">adult</option>
    </select>
    <input type="submit" name="submit" value="Submit Form" />
</form>
</div>
 <script type="text/javascript">
$("#my_form").submit(function(event){
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
		data : form_data
	}).done(function(response){ //
		$("#server-results").html(response);
	});
});
</script>
</div>
</div>

@endsection
 