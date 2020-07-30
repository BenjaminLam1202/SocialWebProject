@extends('layouts.app')
@section('content')


<H3>{{$categories->category}}</H3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories->posts as $post)
        <tr>
            <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
            <td><a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a></td>


            @if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
            <td><a href="/l/{{$post->id}}" >like</a></td>
            @else
            <td><a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" >dislike</a></td>
            @endif


        </td></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection