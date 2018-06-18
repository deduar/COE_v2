<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Experiences;
use App\Currency;
use Auth;
use DB;
use App;
use Session;

class CurrencyController extends Controller
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
            $currencies = DB::table('currency')->paginate(3);
            return view('admin.currency', array('user'=>Auth::user(),'currencies'=>$currencies));
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

    public function changeStatusCurrency($id)
    {
        $currency = Currency::find($id);
        if ($currency->cur_status == 0){
            $currency->cur_status = 1;
        } else {
            $currency->cur_status = 0;
        }
        $currency->save();
        return redirect()->route('admin_currency'); 
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
}
