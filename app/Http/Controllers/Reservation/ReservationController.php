<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Auth;

use App\Reservation;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $myreservations = DB::table('reservation')
            ->join('experience','reservation.res_exp_id','=','experience.id')
            ->join('users','users.id','=','experience.exp_guide_id')
            ->select('experience.id', 'experience.exp_name as exp_name','users.name as user_name',
                    'users.lastName','users.email','users.avatar','reservation.status', 
                    'reservation.res_exp_id', 'reservation.res_user_id', 'reservation.res_guide_id',
                    'reservation.res_date')
            ->get();
        return view('reservation.index', array('user'=>$user, 'myreservations'=>$myreservations));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $exp = App\Experiences::find($id);
        $guide = App\User::find($exp->exp_guide_id);
        return view('reservation.create', array('user'=>Auth::user(), 'exp'=>$exp, 'guide'=>$guide)); 
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
        $reservation = new Reservation();
        $reservation->res_date = $request->res_date;
        $reservation->res_exp_id = $request->res_exp_id;
        $reservation->res_user_id = $user->id;
        $reservation->res_guide_id = $request->res_guide_id;
        $reservation->status = "Waiting";
        $reservation->save();
//        $myexps = App\Experiences::all();
//        $users = App\User::where('group', 'Guide')->get();
        $myreservations = DB::table('reservation')
            ->join('experience','reservation.res_exp_id','=','experience.id')
            ->join('users','users.id','=','experience.exp_guide_id')
            ->get();
        return view('reservation.index', array('user'=>$user, 'myreservations'=>$myreservations));
        //return view('experience.index', array('user'=>Auth::user(), 'myexps'=>$myexps, 'users'=>$users));
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

    public function waiting()
    {
        $user = Auth::user();
        $reservations = DB::table('reservation')
            ->join('experience', 'experience.id','=','reservation.res_exp_id')
            ->join('users','users.id','=','reservation.res_user_id')
            ->get();
        return view('reservation.waiting', array('user'=>$user, 'reservations'=>$reservations));
    }

}
