@extends('layouts.app')
@section('content')
<div class="container">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="patch">
  @csrf
  @method('PATCH')


  <div class="">
   User: {{$user -> username}}
 </div>
 <div class="container">

  <div class="md-form mb-4">
    <i class="fas fa-envelope prefix grey-text"></i>
    <input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title')  ?? $user->profile->title ?? ' '   }}" required>
    <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Title') }}</label>
  </div>


  <div class="md-form mb-4">
    <i class="fas fa-envelope prefix grey-text"></i>
    <input id="des" type="des" class="form-control{{ $errors->has('des') ? ' is-invalid' : '' }}" name="des" value="{{ old('des')  ??  $user -> profile->des ?? ' '  }}" required>
    <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Description')}}</label>
  </div>

  <div class="md-form mb-4">
    <i class="fas fa-envelope prefix grey-text"></i>
    <input id="url" type="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') ??  $user -> profile->url ?? ' '   }}" required>
    <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('URL')}}</label>
  </div>


  <div class="modal-footer d-flex justify-content-center">
    <button class="btn btn-default">Post</button>
  </div>
</div>
</form>
</div>
@endsection