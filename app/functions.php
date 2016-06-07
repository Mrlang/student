<?php

namespace App;

use App\Id_pre;
use App\Migration;
use App\Preference;

class Functions
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    //返回对象   数据库中对应人的信息
    public function getInfo(){
        $res =  User::find($this->id);
        if(!$res) die('查无此人');
        return $res;
    }

    //返回对象,只有查找人的兴趣id
    public function getLikeId(){
        $res= Preference::find($this->id);
//        if(!$res) return new Preference();
        return $res;
    }

    //返回数组,带有id,兴趣名称   ['1'=>'篮球', ... ,'4'=>'乒乓']
    public function getLikeName(){
        $like = Preference::find($this->id);
        if(!$like) return [1=>[] ,2=>[],3=>[],4=>[]];
        for($i=1; $i<5; $i++) {
            $key = 'like'.$i;
            $pres[$i] = Id_pre::find($like->$key) ? Id_pre::find($like->$key)->type : 0;
        }

        return $pres;
    }

    //返回数组    ['info' => 对象, 'like'=> 数组 ]
    public function getInfoLike(){
        $info = $this->getInfo();
        $like = $this->getLikeName();
        return compact('info','like');
    }

    //采用lists从数据库取值,so返回数组    ['1' => array('7'=>'tangyong','5'=>'renzeng') , ...  '4' => array() ]
    public function getFriends(){
        $like = $this->getLikeId();
        if(!$like) return [1=>[] ,2=>[],3=>[],4=>[]];
        for($i=1; $i<5; $i++){
            $key = 'like'.$i;
            $friends[$i] = \DB::table('preferences')
                ->join('users','users.id','=','preferences.id')
                ->orWhere('like1',$like->$key)->where('users.id','<>',\Auth::User()->id)
                ->orWhere('like2',$like->$key)->where('users.id','<>',\Auth::User()->id)
                ->orWhere('like3',$like->$key)->where('users.id','<>',\Auth::User()->id)
                ->orWhere('like4',$like->$key)->where('users.id','<>',\Auth::User()->id)
                ->lists('name','users.id');        //以user.id 值为键值,name值为元素值
        }
        return $friends;
    }

//    返回数组,数组每一个元素是数据库一行对象
    public function getContents(){
        return \DB::table('contents')->where('recv_id',$this->id)->get();
    }


}
