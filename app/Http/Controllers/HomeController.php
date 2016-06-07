<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Id_pre;
use App\Migration;
use App\Preference;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Functions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f = new Functions(\Auth::User()->id);
        return view('home',[
            'info'     =>   $f->getInfo(),
            'pres'     =>   $f->getLikeName(),
            'friends'  =>   $f->getFriends(),
            'contents' =>   $f->getContents()
        ]);
    }

    public function getFriends($like){
        for($i=1; $i<5; $i++){
            $key = 'like'.$i;
            $friends[$i] = \DB::table('preferences')
                            ->join('users','users.id','=','preferences.id')
                            ->orWhere('like1',$like->$key)->where('users.id','<>',\Auth::User()->id)
                            ->orWhere('like2',$like->$key)->where('users.id','<>',\Auth::User()->id)
                            ->orWhere('like3',$like->$key)->where('users.id','<>',\Auth::User()->id)
                            ->orWhere('like4',$like->$key)->where('users.id','<>',\Auth::User()->id)
                            ->lists('name','users.id');
        }
        return $friends;
    }

    function getTable($id){
        $res = \DB::table('tables')->where('id',6)->first();
//        dd($res);return;
        return view('users.table')->with(['res' => $res]);
    }
}
