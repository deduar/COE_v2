<?php

namespace App\Http\Controllers\Experiences;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Session;
use App\User;
use App\Experiences;
use Auth;
use DB;

class ExperiencesController extends Controller
{
    public function __construct()
    {
        App::setLocale(Session::get('locale'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::check()){
            $user = Auth::user();
            $experiences = DB::table('users')
                ->join('experience','users.id','=','experience.exp_guide_id')
                ->where('users.group','Guide')
                ->paginate(6);
                //->get();
            return view('experience.index', array('user'=>Auth::user(), 'experiences'=>$experiences));
            } else {
                return redirect('auth/login');
        }
    }

    public function myexps()
    {
        if (Auth::check()){
            $myexps = App\Experiences::where('exp_guide_id', Auth::user()->id)->get();
            return view('experience.myexps', array('user'=>Auth::user(), 'myexps'=>$myexps));
        } else {
            return redirect('auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $myexp = App\Experiences::all();
        return view('experience.create', array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $exp = new Experiences;
        $exp->exp_name = $request->exp_name;
        $exp->exp_guide_id = $user->id;
        $exp->save();
        if ($user->guide != 'Guide') {
            $user->group = "Guide";
            $user->update();
        }
        $experiences = DB::table('users')
            ->join('experience','users.id','=','experience.exp_guide_id')
            ->where('users.group','Guide')
            ->paginate(6);
            //->get();
        return view('experience.index', array('user'=>Auth::user(), 'experiences'=>$experiences));

/*        $myexps = App\Experiences::all();
        $users = App\User::where('group', 'Guide')->get();
        return view('experience.index', array('user'=>Auth::user(), 'myexps'=>$myexps, 'users'=>$users));  */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        var_dump($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
