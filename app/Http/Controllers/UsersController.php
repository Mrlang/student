<?php

namespace App\Http\Controllers;

use App\Content;
use App\Functions;
use App\Id_pre;
use App\Preference;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function infoForm(){
        $id = \Auth::User()->id;
        $info = User::findOrFail($id);
        return view('users.infoForm')->with(['info'=>$info]);
    }

    public function likeForm(){
        $pres = \DB::table('id_pres')->lists('type','id');
        return view('users.likeForm')->with(compact('pres'));
    }

    public function changeInfo(Requests\InfoRequest $request){
        $user = \Auth::user();
        $info = $request->all();
        unset($info['_token']);
        foreach($info as $key => $value){
            $user->$key = $value;
        }
        $user->save();
//    	  $info = User::findOrFail(\Auth::User()->id);
//        $info->stuID = $request->all()['stuID'];
//        $info->save();//$info->update();

        return redirect('/home');
    }

    public function changeLike(Request $request){
        $id = \Auth::User()->id;
        $pre = Preference::find($id);
        $pre = $pre ? $pre : ['id'=>$id];
        for($i=1;$i<5;$i++){
            $key = 'like'.$i;
            is_array($pre) ? $pre["$key"] = $request->all()["$key"] : $pre->$key = $request->all()["$key"] ;
        }
        is_array($pre) ? Preference::create($pre) : $pre->save();
    	return redirect('/home');
    }

    public function showInfo($id){
        if($id == \Auth::User()->id) return redirect('/home');
        $f = new Functions($id);
        $InfoLike= $f->getInfoLike();
        $contents = $f->getContents();
        return view('users.show')->with(compact('InfoLike','contents'));
    }

    public function postCon(Requests\ConRequest $request){
        $req = $request->all();
        unset($req['_token']);
        Content::create($req);
        return redirect('/show/'.$request->all()['recv_id']);
    }
}
