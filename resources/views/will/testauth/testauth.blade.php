@extends('admin.layout.menu')
@section('contenter')

@auth
 nếu đăng nhập rồi bạn sẽ thấy cái này 
 
@if(auth::user()->roles->first()->name == "admin")
		to la admin :v
@endif
@if(auth::user()->roles->first()->name == "guest")
		to la guest :v
@endif
@endauth

@guest
  cái của mấy cậu chưa đăng nhập

@endguest

@endsection