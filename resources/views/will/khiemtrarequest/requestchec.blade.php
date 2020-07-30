<div class="text-center">
{!! Form::open(array('route' => 'test.check.request', 'class' => '')) !!}
    <div>
        <label  class="name">enter any value name you want</label>
            {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"your name value"]) !!}
    </div>
    <div>
        <label  class="email">enter any value email you want</label>
            {!! Form::text('email', null, ['class' => 'input-text', 'placeholder'=>"your email value"]) !!}
    </div>
    <div>
        <label  class="title">enter any value title you want</label>
            {!! Form::text('title', null, ['class' => 'input-text', 'placeholder'=>"your title value"]) !!}
    </div>
    <div>
        <label  class="1">enter any value 1 you want</label>
            {!! Form::text('1', null, ['class' => 'input-text', 'placeholder'=>"your 1 value"]) !!}
    </div>
    <div>
        <label  class="2">enter any value 2 you want</label>
            {!! Form::text('2', null, ['class' => 'input-text', 'placeholder'=>"your 2 value"]) !!}
    </div>
    <div>
        <label  class="3">enter any value 3 you want</label>
            {!! Form::text('3', null, ['class' => 'input-text', 'placeholder'=>"your 3 value"]) !!}
    </div>
    	    {!! Form::submit() !!}
    {!! Form::close() !!}
</div>