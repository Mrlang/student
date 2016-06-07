@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">

            {{--左侧基本信息栏/start/--}}
            <div class="col-xs-2 col-md-2 sidebar" style="margin-left: 50px;color: pink;">
                <ul class="nav nav-sidebar" style="background:#FFD0AA;border-radius: 10px;">
                    <li class="active" style="text-align: center;"><a href="#">个人信息:<span class="sr-only">(current)</span></a></li>
                    <li><a>姓名:{{ $InfoLike['info']->name }}</a></li>
                    <li><a>学号:{{ $InfoLike['info']->stuID }}</a></li>
                    <li><a>Email:{{ $InfoLike['info']->email }}</a></li>
                    <li><a>QQ:{{ $InfoLike['info']->QQ }}</a></li>
                    <li><a>Phone:{{ $InfoLike['info']->phone }}</a></li>
                    <li><a>age:{{ $InfoLike['info']->age }}</a></li>
                    <li><a>sex:{{ $InfoLike['info']->sex }}</a></li>
                    <li><a href="/table/{{ $InfoLike['info']->id }}"><input class="btn btn-default" type="submit" value="查看课表"></a></li>
                    @if( \Auth::check() && \Auth::User()->id == $InfoLike['info']->id)
                    <li><a href="/users/changeInfo"><button type="button" class="btn btn-xs btn-info btn-block">修改</button></a></li>
                    @endif
                </ul>
            </div>
            {{--左侧基本信息栏/end/--}}

            {{--兴趣爱好栏/start/--}}
            <div class="panel panel-success col-md-8" style="margin-left: 120px;">
                <div class="panel-heading">
                    @if( \Auth::check() && \Auth::User()->id == $InfoLike['info']->id)
                    <a href="/users/changeLike"><button type="button" class="btn btn-xs btn-warning col-md-2" >修改</button></a>
                    @endif
                    <h3 class="panel-title">兴趣爱好</h3>
                </div>

                @foreach($InfoLike['like'] as $key => $like)
                <div class="panel-body" style="border: inherit">
                    爱好{{ $key }}:
                    <button type="button" class="btn btn-xs btn-default">{{ $like ? $like : '暂无'}}</button>
                    @if( \Auth::check() && \Auth::User()->id == $InfoLike['info']->id)
                        <span  style="margin-left: 80px;">志趣相投:
                            @foreach($friends[$key] as $id => $name)
                                <a href="users/{{ $id }}">{{ $name }};</a>
                            @endforeach
                    </span>
                    @endif
                </div>
                @endforeach


            {{--给他的信息/start/--}}
                <div class="col-md-15" style="width: 100%;height: 20px;margin: 20px 0px;">
                    <h1>留言板:</h1>
                </div>
                @foreach($contents as $key => $cont)
                    <div class="highlight">
                        <pre><p style="font-size: 16px;">{{ $cont->con }}</p><p style="margin-left: 500px;font-size: 10px;color: #2aabd2">{{ $cont->updated_at }}  --By {{ $cont->send_name }}<a href="/show/{{ $cont->send_id }}">[交流]</a></p></pre>
                    </div>
                @endforeach
                <div class="highlight">
                    <pre><p style="font-size: 16px;">欢迎使用!</p><p style="margin-left: 500px;font-size: 10px;color: #2aabd2">2016/6/1  --By 管理员</p></pre>
                </div>
            {{--给他的信息/end/--}}

            {{--发表评论框/start/--}}
            @if( \Auth::check() && \Auth::User()->id != $InfoLike['info']->id)
            <div>
                <div class="form-group">
                {!! Form::open(['url' => '/postCon']) !!}
                {!! Form::textarea('con','有共同爱好吗?快来和他交个朋友吧!~~',['class'=>'form-control']) !!}
                {!! Form::hidden('send_id',\Auth::User()->id) !!}
                {!! Form::hidden('recv_id',$InfoLike['info']->id) !!}
                {!! Form::hidden('send_name',\Auth::User()->name) !!}
                {!! Form::hidden('recv_name',$InfoLike['info']->name) !!}
                {!! Form::submit('发送',['class'=>'btn btn-success form-control']) !!}
                {!! Form::close() !!}
                </div>
            </div>
            @endif
            {{--发表评论框/end/--}}

        {{--兴趣爱好栏/end/--}}
        </div>


        </div>
    </div>
@endsection