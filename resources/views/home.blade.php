@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-md-2 sidebar" style="margin-left: 50px;color: pink;">
                <ul class="nav nav-sidebar" style="background:#FFD0AA;border-radius: 10px;">
                    <li class="active" style="text-align: center;"><a href="#">个人信息:<span class="sr-only">(current)</span></a></li>
                    <li><a>姓名:{{ $info->name }}</a></li>
                    <li><a>学号:{{ $info->stuID }}</a></li>
                    <li><a>Email:{{ $info->email }}</a></li>
                    <li><a>QQ:{{ $info->QQ }}</a></li>
                    <li><a>Phone:{{ $info->phone }}</a></li>
                    <li><a>age:{{ $info->age }}</a></li>
                    <li><a>sex:{{ $info->sex }}</a></li>
                    <li><a href="/table/{{ $info->id }}"><input class="btn btn-default" type="submit" value="查看课表"></a></li>
                    <li><a href="/users/changeInfo"><button type="button" class="btn btn-xs btn-info btn-block">修改</button></a></li>
                </ul>
            </div>

            {{--兴趣爱好--}}
            <div class="panel panel-success col-md-8" style="float: right;right:100px;padding: 0px;">
                <div class="panel-heading">
                    <a href="/users/changeLike"><button type="button" class="btn btn-xs btn-warning col-md-2" >修改</button></a>
                    <h3 class="panel-title">兴趣爱好</h3>
                </div>


                <div class="panel-body" style="border: inherit">
                    爱好1:
                    <button type="button" class="btn btn-xs btn-default">{{ $pres['1'] ? $pres['1'] : '暂无'}}</button>
                    <span  style="margin-left: 80px;">志趣相投:
                        @foreach($friends[1] as $id => $name)
                            <a href="show/{{ $id }}">{{ $name }};</a>
                        @endforeach
                    </span>
                </div>
                <div class="panel-body" style="border: inherit">
                    爱好2:
                    <button type="button" class="btn btn-xs btn-default">{{ $pres['2'] ? $pres['2'] : '暂无' }}</button>
                     <span  style="margin-left: 80px;">志趣相投:
                         @foreach($friends[2] as $id => $name)
                             <a href="show/{{ $id }}">{{ $name }};</a>
                         @endforeach
                    </span>
                </div>
                <div class="panel-body" style="border: inherit">
                    爱好3:
                    <button type="button" class="btn btn-xs btn-default">{{ $pres['3'] ? $pres['3'] : '暂无' }}</button>
                     <span  style="margin-left: 80px;">志趣相投:
                         @foreach($friends[3] as $id => $name)
                             <a href="show/{{ $id }}">{{ $name }};</a>
                         @endforeach
                    </span>
                </div>
                <div class="panel-body" style="border: inherit">
                    爱好4:
                    <button type="button" class="btn btn-xs btn-default">{{ $pres['4'] ? $pres['4'] : '暂无' }}</button>
                     <span  style="margin-left: 80px;">志趣相投:
                         @foreach($friends[4] as $id => $name)
                             <a href="show/{{ $id }}">{{ $name }};</a>
                         @endforeach
                    </span>
                </div>




                {{--给我的信息/start/--}}
                <div class="col-md-15" style="width: 100%;height: 20px;margin: 20px 0px;">
                    <h1 style="font-family: 'Lato'">留言板:</h1>
                </div>
                @foreach($contents as $key => $cont)
                    <div class="highlight">
                        <pre><p style="font-size: 16px;">{{ $cont->con }}</p><p style="margin-left: 500px;font-size: 10px;color: #2aabd2">{{ $cont->updated_at }}  --By {{ $cont->send_name }}<a href="/show/{{ $cont->send_id }}">[交流]</a></p></pre>
                    </div>
                @endforeach
                <div class="highlight">
                    <pre><p style="font-size: 16px;">欢迎使用!</p><p style="margin-left: 500px;font-size: 10px;color: #2aabd2">2016/6/1  --By 管理员</p></pre>
                </div>
                {{--给我的信息/end/--}}


            </div>
            {{--兴趣爱好--}}

        </div>
    </div>
@endsection