<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Session;
use Auth;

use App\Reservation;
use Carbon;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
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
        if(Auth::guest()){
            return redirect('auth/login');
        } else {
        $user = Auth::user();
        $myreservations = DB::table('reservation')
            ->join('experience','reservation.res_exp_id','=','experience.id')
            ->join('users','users.id','=','experience.exp_guide_id')
            ->select('experience.id', 'experience.exp_name as exp_name','users.name as user_name','users.last_name','users.email','users.avatar','reservation.status','reservation.id as res_id','reservation.res_exp_id', 'reservation.res_user_id','reservation.res_guide_id','reservation.created_at','reservation.res_date','reservation.paid')
            ->where('reservation.res_user_id','=',$user->id)
            ->where('reservation.status','!=','Waiting')
            ->orderBy('reservation.res_date', 'desc')
            ->paginate(10);
        $now = Carbon\Carbon::now();
        foreach ($myreservations as $key => $reservation) {
            if($reservation->status == "Waiting"){
                $res_date = Carbon\Carbon::parse($reservation->res_date);
                $created_at = Carbon\Carbon::parse($reservation->created_at);
                if ($now->gt($res_date)){
                    $this->Rejected($reservation->res_id);
                }
                if ($now->diff($created_at)->d > 3){
                    $this->Rejected($reservation->res_id);
                }
            }
        }
        return view('reservation.index', array('user'=>$user, 'myreservations'=>$myreservations, 'now'=>$now));
        }
    }

    public function waiting()
    {
        if(Auth::guest()){
            return redirect('auth/login');
        } else {
        $user = Auth::user();
        $reservations = DB::table('reservation')
            ->join('experience','reservation.res_exp_id','=','experience.id')
            ->join('users','users.id','=','experience.exp_guide_id')
            ->select('experience.id','experience.exp_name as exp_name','users.name as user_name','users.last_name','users.email','users.avatar','reservation.status','reservation.id as res_id','reservation.res_exp_id','reservation.res_user_id','reservation.res_guide_id','reservation.created_at','reservation.res_date','reservation.paid')
            ->where('reservation.res_user_id','=',$user->id)
            ->where('reservation.status','=','Waiting')
            ->orderBy('reservation.res_date', 'desc')
            ->paginate(10);
        
        $now = Carbon\Carbon::now();
        foreach ($reservations as $key => $reservation) {
            if($reservation->status == "Waiting"){
                $res_date = Carbon\Carbon::parse($reservation->res_date);
                $created_at = Carbon\Carbon::parse($reservation->created_at);
                if ($now->gt($res_date)){
                    //echo $reservation->res_id. "Canceled Res > Now <br>";
                    $this->Rejected($reservation->res_id);
                }
                if ($now->diff($created_at)->d > 3){
                    //echo $reservation->res_id. "Canceled Creat > 3D <br>";
                    $this->Rejected($reservation->res_id);
                }
            }
        }

        return view('reservation.waiting', array('user'=>$user, 'reservations'=>$reservations, 'now'=>$now));
        }
    }

    public function Canceled($id)
    {
        $res = Reservation::find($id);
        $res->status = "Canceled";
        $res->update();
    }

    public function reservationList ()
    {
        if(Auth::guest()){
            return redirect('auth/login');
        } else {
            $user = Auth::user();
            $reservations_list = DB::table('reservation')
                ->join('experience','reservation.res_exp_id','=','experience.id')
                ->join('users','reservation.res_user_id','=','users.id')
                ->select('experience.id', 'experience.exp_name as exp_name','users.name as user_name','users.last_name','users.email','users.avatar','reservation.status','reservation.id as res_id','reservation.res_exp_id', 'reservation.res_user_id', 'reservation.res_guide_id','reservation.created_at','reservation.res_date','reservation.paid')
                ->where('reservation.res_guide_id','=',$user->id)
                ->where('reservation.status','!=','Waiting')
                ->orderBy('reservation.res_date', 'desc')
                ->paginate(10);
            $now = Carbon\Carbon::now();
            return view('reservation.reservation_list', array('user'=>$user, 'reservations_list'=>$reservations_list, 'now'=>$now));
        }
    }

    public function reservationListWaiting()
    {
    	if(Auth::guest()){
            return redirect('auth/login');
        } else {
            $user = Auth::user();
            $reservations_list_waiting = DB::table('reservation')
                ->join('experience','reservation.res_exp_id','=','experience.id')
                ->join('users','reservation.res_user_id','=','users.id')
                ->select('experience.id', 'experience.exp_name as exp_name','users.name as user_name','users.last_name','users.email','users.avatar','reservation.status','reservation.id as res_id','reservation.res_exp_id', 'reservation.res_user_id', 'reservation.res_guide_id','reservation.created_at','reservation.res_date','reservation.paid')
                ->where('reservation.res_guide_id',$user->id)
                ->where('reservation.status','=','Waiting')
                ->orderBy('reservation.res_date', 'desc')
                ->paginate(10);
            $now = Carbon\Carbon::now();
            return view('reservation.reservation_list_waiting', array('user'=>$user, 'reservations_list_waiting'=>$reservations_list_waiting, 'now'=>$now));
        }
    }

    public function Rejected($id)
    {
        $res = Reservation::find($id);
        $res->status = "Expired";
        $res->update();
        return redirect()->back();
    }

    public function Cancel($id)
    {
        //$user = Auth::user();
        $res = Reservation::find($id);
        $res->status = "Canceled";
        $res->update();
        return redirect()->route('reservation');
    }

    public function Reject($id)
    {
        $user = Auth::user();
        $res = Reservation::find($id);
        $res->status = "Rejected";
        $res->update();
        return redirect()->back();
    }

    public function Accept($id)
    {
        $user = Auth::user();
        $res = Reservation::find($id);
        $res->status = "Accepted";
        $res->update();
        return redirect()->back();
    }

    public function PayTransfer($id)
    {
        $user = Auth::user();
        $res = Reservation::find($id);
        $res->status = "Waiting";
        $res->paid = "WaitingConfirm";
        $res->update();
        return redirect()->route('reservation');
    }

    public function PayPaypal($id)
    {
        $user = Auth::user();
        $res = Reservation::find($id);
        $res->status = "Waiting";
        $res->paid = "Paid";
        $res->update();
        return redirect()->route('reservation');
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
    public function confirm(Request $request)
    {
        $user = Auth::user();
        $data = array();
        $exp = App\Experiences::find($request->exp_id);
        $currency = App\Currency::find($exp->exp_currency);

        $guide = App\User::find($exp->exp_guide_id);
        //$data['date'] = Carbon\Carbon::parse($request->datepick)->format('Y-m-d H:i');
        $data['date'] = $request->datepick;
        $data['exp_id'] = $request->exp_id;
        $data['user_id'] = $user->id;
        $data['guide_id'] = $exp->exp_guide_id;
        $data['flat'] = $exp->exp_flat;
        $data['price'] = $exp->exp_price;
        $data['pax'] = $request->pax;
        if ($exp->exp_flat){
            $data['amount'] = $exp->exp_price;
        }else{
            $data['amount'] = $exp->exp_price * $request->pax;
        }
        return view('reservation.confirm', array('user'=>Auth::user(),'data'=>$data,'exp'=>$exp,'guide'=>$guide, 'currency'=>$currency));
    }

    public function store(Request $request)
    {
        if (Auth::user()){
            $user = Auth::user();
            $reservation = new Reservation();
            //$reservation->res_date = Carbon\Carbon::parse($request->datepick)->format('Y-m-d H:i');
            $date = $request->date;
            $explode_date = explode('/',explode(' ',$date)[0]);
            $reservation->res_date = $explode_date[2]."-".$explode_date[0].'-'.$explode_date[1].' '.explode(' ',$date)[1];
            $reservation->res_exp_id = $request->exp_id;
            $reservation->res_user_id = $user->id;
            $reservation->res_guide_id = $request->guide_id;
            $reservation->status = "Waiting";
            if ($request->acction === "paypal") {
                $reservation->paid = "Paid";
            } 
            if ($request->acction === "bank") {
                $reservation->paid = "Unpaid";
            }
            
            $reservation->save();
            return redirect()->route('reservation');
        } else {
            return redirect('auth/login');
        }
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

    public function collection()
    {
        $user = Auth::user();
        return view('reservation.collection', array('user'=>$user = Auth::user()));   
    }

    public function transactionLog()
    {
        $user = Auth::user();
        return view('reservation.trans_log', array('user'=>$user = Auth::user()));   
    }

}
