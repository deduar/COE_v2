<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Reservation;
use Auth;
use DB;
use App;
use Session;

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
        if ($user->admin) {
            $reservations = DB::table('reservation')
                ->join('experience','experience.id','=','reservation.res_exp_id')
                ->join('users','users.id','=','reservation.res_user_id')
                ->select('reservation.id as id','reservation.res_exp_id','users.name','users.last_name','users.avatar','reservation.status','reservation.paid','reservation.res_date')
                ->orderBy('reservation.created_at','desc')
                ->paginate(10);
            return view('admin.reservation', array('user'=>Auth::user(),'reservations'=>$reservations));
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

    public function checkPaid($id)
    {
        $res = App\Reservation::find($id);
        $res->paid = "Paid";
        $res->save();
        return redirect()->back();
    }
}
