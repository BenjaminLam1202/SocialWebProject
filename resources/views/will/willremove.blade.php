@extends('admin.layout.menu')
@section('contenter')
<div class="text-center">
{!! Form::open(array('route' => 'test.me', 'class' => '')) !!}
    <div>
        <label  class="email">enter any value you want</label>
            {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"your value"]) !!}
    </div>
    {!! Form::close() !!}
</div>



@endsection