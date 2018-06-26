<?php

namespace App\Http\Controllers\Experiences;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Session;
use App\User;
use App\Experiences;
use Image;
use Auth;
use DB;

class ExperiencesController extends Controller
{
    public function __construct()
    {
        App::setLocale(Session::get('locale'));
    }

    public function welcome()
    {
        $experiences = DB::table('experience')
                ->join('users','users.id','=','experience.exp_guide_id')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id as exp_id', 'users.id as user_id','exp_photo', 'exp_name', 'avatar', 'name', 'lastName', 'email', 'exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
                ->where('users.group','Guide')
                ->orderBy('experience.created_at','desc')
                ->paginate(6);
        return view('welcome', array('experiences'=>$experiences));
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
        } else {
            $user = App\User::first();
        }            
            $experiences = DB::table('experience')
                ->join('users','users.id','=','experience.exp_guide_id')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id as exp_id', 'users.id as user_id','exp_photo', 'exp_name', 'avatar', 'name', 'lastName', 'email', 'exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
                ->where('users.group','Guide')
                ->orderBy('experience.created_at','desc')
                ->paginate(6);
                //->get();
            return view('experience.index', array('user'=>$user, 'experiences'=>$experiences));
    }

    public function myexps()
    {
        if (Auth::check()){
            $myexps = App\Experiences::where('exp_guide_id', Auth::user()->id)->orderBy('experience.created_at','desc')->paginate(6);
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
        $currencies = App\Currency::all(['id','cur_name','cur_simbol']);
        $cur = [];
        foreach($currencies as $currency){
           $cur[$currency->id] = $currency->cur_name.' ['.$currency->cur_simbol.']';
        }
        return view('experience.create', array('user'=>Auth::user(),'cur'=>$cur));
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
        if ($request->file('exp_photo')){
            $filename = time().'.'.$request->file('exp_photo')->getClientOriginalExtension();
            Image::make($request->file('exp_photo'))->resize(300,300)->save( public_path('uploads/exp/'.$filename));
            $exp->exp_photo = $filename;
        }
        $exp->exp_location = $request->exp_location;
        $exp->exp_min_people = $request->exp_min_people;
        $exp->exp_max_people = $request->exp_max_people;
        $exp->exp_duration = $request->exp_duration;
        $exp->exp_duration_h = $request->exp_duration_h;
        $exp->exp_price = $request->exp_price;
        $exp->exp_currency = $request->exp_currency;
        $exp->exp_category = $request->exp_category;
        $exp->exp_private_notes = $request->exp_private_notes;

        $exp->save();        
        
        if ($user->guide != 'Guide') {
            $user->group = "Guide";
            $user->update();
        }
        
        return redirect()->route('my_experience');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp = DB::table('experience')
                ->join('users','users.id','=','experience.exp_guide_id')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id as exp_id', 'exp_photo', 'exp_name', 'exp_location','exp_summary','exp_min_people','exp_max_people','exp_duration','exp_duration_h','exp_category','avatar', 'name', 'lastName', 'email', 'exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
                ->where('experience.id',$id)
                ->first();
        return view('experience.show', array('user'=>Auth::user(),'exp'=>$exp));
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