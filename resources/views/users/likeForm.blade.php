@extends('layouts.app')
@section('content')
    {{--{{dd($pres)}}--}}
<div class="container">
<div class="row">



{!! Form::open(['url'=>'/users/changeLike']) !!}
<div class="form-group">
    {!! Form::label('like1','爱好1:') !!}
    {!! Form::select('like1',$pres,'1',['class'=>'form-control']) !!}
    {!! Form::label('like2','爱好2:') !!}
    {!! Form::select('like2',$pres, '1',['class'=>'form-control']) !!}
    {!! Form::label('like3','爱好3') !!}
    {!! Form::select('like3',$pres,'1',['class'=>'form-control'] )!!}
    {!! Form::label('like4','爱好4') !!}
    {!! Form::select('like4',$pres,'1',['class'=>'form-control'] ) !!}
    {!! Form::submit('修改',['class'=>'btn btn-success form-control']) !!}
    {!! Form::close() !!}

</div>

</div>
</div>
</div>
@stop
