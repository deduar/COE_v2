<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Experiences;
use Auth;
use DB;
use App;
use Session;

class AdminController extends Controller
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
        $user = Auth::user();
        if ($user->admin) {
            return view('admin.index', array('user'=>Auth::user()));
        } else {
            return view('experiences.index', array('user'=>Auth::user()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

    public function users()
    {
        $users = DB::table('users')
        ->orderBy('users.created_at','desc')
        ->paginate(3);
        return view ('admin.users', array('user'=>Auth::user(),'users'=>$users));
    }

    public function promoveAdmin($id)
    {
        $user = User::find($id);
        if ($user->admin) {
            $user->admin = false;
        } else {
            $user->admin = true;
        }
        $user->save();
        return redirect()->route('admin_users');
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->status == "Active") {
            $user->status = "Inactive";
        } else {
            $user->status = "Active";
        }
        $user->save();
        return redirect()->route('admin_users');
    }

    public function experiences()
    {
        $experiences = DB::table('users')
                ->join('experience','users.id','=','experience.exp_guide_id')
                ->orderBy('experience.created_at','desc')
                ->paginate(10);
        //$experiences = Experiences::all();
        return view ('admin.experiences', array('user'=>Auth::user(),'experiences'=>$experiences));
    }

}
