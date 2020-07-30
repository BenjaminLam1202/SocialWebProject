
@extends('admin.layout.menu')
@extends('post.create')
@section('contenter')
<div class="container-fluid">
          <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Post Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Post Data</a>
            </form>
        </div>
  <div class="pt-5">
        <button href="/p/create" type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalLoginForm"> New Post </button>
      </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <div>
          <td><a  href="/api/admin/article/detail/post/{{ $post->id }}">{{$post->title}}</a></td>
        </div>

        <td>{{$post->des}}</td>
        <td>{{$post->category->category}}</td>





        <td class="text-center"><a class='btn btn-info btn-xs'  href="/profile/po/{{$post->id}}/edit" ><span class="glyphicon glyphicon-edit"></span> Edit</a> <a  href="/d/{{$post->id}}"  class="btn btn-danger btn-xs" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" type="button"><span class="glyphicon glyphicon-remove"></span> Del</a></td>

        @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
        <td><a href="/l/{{$post->id}}" >like</a></td>
        @else
        <td><a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" >dislike</a></td>
        @endif
      </div>

    </tr>
    @endforeach
  </tbody>
</table>
{{ $posts->links() }}
</div>

@endsection