@extends('layouts.app')
@section('content')
    <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/changeInfo') }}">
    {{ csrf_field() }}


    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $info['email'] }}">

    @if ($errors->has('email'))
    <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="form-group{{ $errors->has('stuID') ? ' has-error' : '' }}">
    <label for="stuID" class="col-md-4 control-label">stuID</label>

    <div class="col-md-6">
    <input id="stuID" type="text" class="form-control" name="stuID" value="{{ old('stuID') ? old('stuID') : $info['stuID'] }}">

    @if ($errors->has('stuID'))
    <span class="help-block">
    <strong>{{ $errors->first('stuID') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="form-group{{ $errors->has('QQ') ? ' has-error' : '' }}">
    <label for="QQ" class="col-md-4 control-label">QQ</label>

    <div class="col-md-6">
    <input id="QQ" type="text" class="form-control" name="QQ" value="{{ old('QQ') ? old('QQ') : $info['QQ'] }}">

    @if ($errors->has('QQ'))
    <span class="help-block">
    <strong>{{ $errors->first('QQ') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-md-4 control-label">Phone</label>

    <div class="col-md-6">
    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $info['phone'] }}">

    @if ($errors->has('phone'))
    <span class="help-block">
    <strong>{{ $errors->first('phone') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
    <label for="age" class="col-md-4 control-label">Age</label>

    <div class="col-md-6">
    <input id="age" type="text" class="form-control" name="age" value="{{ old('age') ? old('age') : $info['age'] }}">

    @if ($errors->has('age'))
    <span class="help-block">
    <strong>{{ $errors->first('age') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
    <label for="sex" class="col-md-4 control-label">sex</label>

    <div class="col-md-6">
    <label><input id="sex" type="radio" class="form-control" name="sex" value="f">女</label>
    <label><input id="sex" type="radio" class="form-control" name="sex" value="m">男</label>

    @if ($errors->has('sex'))
    <span class="help-block">
    <strong>{{ $errors->first('sex') }}</strong>
    </span>
    @endif
    </div>
    </div>



    <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-success form-control">
    <i class="fa fa-btn fa-user"></i> 修改
    </button>
    </div>
    </div>
    </form>
    </div>
@endsection