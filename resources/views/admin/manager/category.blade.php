@extends('admin.layout.menu')
@section('contenter')
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
{{--                     <script type="text/javascript">
                        $(".my_topic_form").submit(function(event){
        var category = $("input[name=category]").val();
        console.log(category);
      
       
            var t1 ='<tb>'+category+'</tb>';
            console.log(t1);
            $("tr").append(t1); 
        });
   

                    </script> --}}
                </div>
 <script type="text/javascript">
            
                    $(".my_topic_form").submit(function(event){
                     $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    var category = $("input[name=category]").val();
        console.log(category);
    


    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data, 
        success:function(data){

             window.history.go(0);
          alert("success!! reload page to update");

      }
    }).done(function(response){ //



    });
    var t1 ='<tr><td><strong> <span>'+category+'</span></strong></td></tr>';
            console.log(t1);
            $("#thistb").append(t1); 

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
    <tbody id="thistb">
        <tr id="inheretbody"></tr>
        @foreach($categories as $category)
        <tr>
            <td><strong> <span id="display{{$category->id}}">{{$category->category}}</span></strong></td>


            <td><button class="btn btn-danger btn-xs delete_here{{$category->id}}" id="delete_here{{$category->id}}" type="button" data-mid="{{$category->id}}" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});"><span class="glyphicon glyphicon-remove"></span>Delete</button><button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#myModaledit{{$category->id}}"><span class="glyphicon glyphicon-edit"></span>edit</button></td>

            <div id="myModaledit{{$category->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit your topic</h4>
                </div>
                <div class="modal-body">
                    <div>



                        <form action="/api/admin/categories/{{$category->id}}/update" method="patch" data-mid="{{$category->id}}" class="my_topic_change_form_{{$category->id}}" id="my_topic_change_form_{{$category->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Remane topic name {{$category->id}}</label>
                                <input type="text" class="form-control" id="categoryrt{{$category->id}}" name="category" aria-describedby="noticeHelp" placeholder="Topic name">


                  </div>
                            <button type="submit" class="btn btn-primary">Change</button> 
                        </form>

                    </div>
                    

<script type="text/javascript">
           
</script>
<script type="text/javascript">

    $(document).ready(function() {
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
      $('#delete_here{{$category->id}}').on('click', function (e) {
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
            success: function( data ) {

                alert("success!! reload page to update");
              //console.log(msg);
              // $(this).closest('tr').remove();
             
          }
      });
    });
  });

</script>

<script type="text/javascript">
                        $(".my_topic_change_form_{{$category->id}}").submit(function(event){
                         $.ajaxSetup({

                            headers: {

                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                            }

                        });
    event.preventDefault(); //prevent default action
    var category = $("input[name=category]").val(); 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
        var categoryf = $("input[id=categoryrt{{$category->id}}]").val(); 
         console.log(categoryf);       
                
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data, 
        success:function(data){
        $('#display{{$category->id}}').text(categoryf);
          




      }
    }).done(function(response){ //
         $("#server-results").html(response);


    });

});
 
</script>

 
</div>
{{-- <span id="display"></span>
<span id="sdf">sdf</span> --}}
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
@endsection
</tbody>
</div>
