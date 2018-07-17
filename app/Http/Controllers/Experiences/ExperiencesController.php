<?php

namespace App\Http\Controllers\Experiences;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use Session;
use App\User;
use App\Experiences;
use App\ExperiencesPhotos;
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
        if(Auth::guest()){
            $user = null;
        } else {
            $user = Auth::user();
        }
        $experiences = DB::table('experience')
                ->join('users','users.id','=','experience.exp_guide_id')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id as exp_id', 'users.id as user_id','exp_photo', 'exp_name', 'avatar', 'name', 'last_name', 'email', 'exp_location','exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
                ->where('users.group','Guide')
                ->orderBy('experience.created_at','desc')
                ->paginate(6);
        return view('welcome', array('user'=>$user,'experiences'=>$experiences));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::guest()){
            $user = null;
        } else {
            $user = Auth::user();
        }
        $experiences = DB::table('experience')
            ->join('users','users.id','=','experience.exp_guide_id')
            ->join('currency','experience.exp_currency','=','currency.id')
            ->select('experience.id as exp_id', 'users.id as user_id','exp_photo', 'exp_name', 'avatar', 'name', 'last_name', 'email', 'exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
            ->where('users.group','Guide')
            ->orderBy('experience.created_at','desc')
            ->paginate(6);
        return view('experience.index', array('user'=>$user, 'experiences'=>$experiences));
    }

    public function myexps()
    {
        if (Auth::check()){
            $myexps = App\Experiences::where('exp_guide_id', Auth::user()->id)->orderBy('experience.created_at','desc')->paginate(6);
            return view('experience.myexps', array('user'=>Auth::user(), 'myexps'=>$myexps));
        } else {
            //return redirect()->route('login');
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

        $myexps = DB::table('experience')
            ->join('currency','experience.exp_currency','=','currency.id')
            ->where('experience.exp_guide_id',$user->id)
            ->orderBy('experience.created_at','desc')
            ->paginate(4);

        return view('experience.create', array('user'=>Auth::user(),'cur'=>$cur,'myexps'=>$myexps));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,
            array(
                'exp_name'=>'required',
                'exp_location'=>'required',
                'exp_summary'=>'required',
                'exp_photo'=>'required',
                'exp_summary'=>'required',
                'exp_min_people'=>'required',
                'exp_max_people'=>'required',
                'exp_duration'=>'required',
                'exp_duration_h'=>'required',
                'exp_price'=>'required',
                'exp_currency'=>'required',
                'exp_category',
                'exp_private_note',
                'exp_video',
            ),
            array(
            )
        );

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
        $exp->exp_summary = $request->exp_summary;
        $exp->exp_min_people = $request->exp_min_people;
        $exp->exp_max_people = $request->exp_max_people;
        $exp->exp_duration = $request->exp_duration;
        $exp->exp_duration_h = $request->exp_duration_h;
        $exp->exp_price = $request->exp_price;
        $exp->exp_currency = $request->exp_currency;
        $exp->exp_category = $request->exp_category;
        $exp->exp_private_notes = $request->exp_private_notes;
        $exp->exp_video = $request->exp_video;

        $exp->save();

        if($request->hasFile('file'))
        {
            $files = $request->file('file');
            foreach ($files as $file) {
                $exp_photo = new ExperiencesPhotos;
                $exp_photo->exp_id = $exp->id;
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/exp/', $filename);
                $exp_photo->exp_photo = $filename;
                $exp_photo->save();
            }
        }
        
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
        if(Auth::guest()){
            $user = null;
        } else {
            $user = Auth::user();
        } 
        $exp = DB::table('experience')
                ->join('users','users.id','=','experience.exp_guide_id')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id as exp_id', 'exp_photo', 'exp_name', 'exp_location','exp_summary','exp_min_people','exp_max_people','exp_duration','exp_duration_h','exp_category','avatar', 'name', 'last_name', 'email', 'exp_price', 'cur_simbol', 'cur_name', 'cur_exchange', 'exp_guide_id')
                ->where('experience.id',$id)
                ->first();
        return view('experience.show', array('user'=>$user,'exp'=>$exp));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()){
        $user = Auth::user();
        $exp = App\Experiences::find($id);
        $currencies = App\Currency::all(['id','cur_name','cur_simbol']);
        $cur = [];
        foreach($currencies as $currency){
           $cur[$currency->id] = $currency->cur_name.' ['.$currency->cur_simbol.']';
        }

        $myexps = DB::table('experience')
            ->join('currency','experience.exp_currency','=','currency.id')
            ->where('experience.exp_guide_id',$user->id)
            ->orderBy('experience.created_at','desc')
            ->paginate(4);

        $exp_photos = DB::table('experience_photos')
            ->where('exp_id',$id)
            ->get();

        return view('experience.edit', array('user'=>Auth::user(),'exp'=>$exp,'cur'=>$cur,'myexps'=>$myexps, 'exp_photos'=>$exp_photos));
        } else {
            return redirect('auth/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $exp = App\Experiences::find($request->id);
        $exp->update($request->all());
        if($request->hasFile('exp_photo'))
        {
            $exp_photo = $request->file('exp_photo');
            $filename = time().'.'.$exp_photo->getClientOriginalExtension();
            Image::make($exp_photo)->resize(300,300)->save( public_path('uploads/exp/'.$filename));
            $exp->exp_photo = $filename;
            $exp->save();
        }

        if($request->hasFile('file')){
            foreach ($request->file('file') as $key=>$file) {
                $filename = time()+($key).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->save( public_path('uploads/exp/'.$filename));
                $file_pho = new ExperiencesPhotos();
                $file_pho->exp_id = $exp->id;
                $file_pho->exp_photo = $filename;
                $file_pho->save();
            }
        }

        return redirect()->route('my_experience');
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

    public function remove_img($id)
    {
        $exp_img = DB::table('experience_photos')
            ->where('id',$id)
            ->delete();
        return back()->withInput(['tab-pane'=>'photos']);
    }
}