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
                ->where('experience.exp_status','Active')
                ->where('experience.exp_published','Active')
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
            ->where('experience.exp_status','Active')
            ->where('experience.exp_published','Active')
            ->orderBy('experience.created_at','desc')
            ->paginate(6);
        return view('experience.index', array('user'=>$user, 'experiences'=>$experiences));
    }

    public function myexps()
    {
        if (Auth::check()){
            $user = Auth::user();   
            $myexps = DB::table('experience')
                ->join('currency','experience.exp_currency','=','currency.id')
                ->select('experience.id', 'experience.exp_photo','experience.exp_name','experience.exp_location', 'experience.exp_price', 'experience.exp_status','experience.exp_published','currency.cur_name','currency.cur_simbol')
                ->where('experience.exp_guide_id',$user->id)
                ->orderBy('experience.created_at','desc')
                ->paginate(6);
            return view('experience.myexps', array('user'=>$user, 'myexps'=>$myexps));
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
        
        $currencies = App\Currency::all(['id','cur_name','cur_simbol']);
        $cur = [];
        foreach($currencies as $currency){
           $cur[$currency->id] = $currency->cur_name.' ['.$currency->cur_simbol.']';
        }
        
        $experienceCategory = App\ExperiencesCategories::all(['id','category_name']);        
        $cat = [];
        foreach($experienceCategory as $category){
           $cat[$category->id] = $category->category_name;
        }

        return view('experience.create', array('user'=>Auth::user(),'cur'=>$cur,'cat'=>$cat));
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
                'exp_min_people'=>'required | integer | min: 0',
                'exp_max_people'=>'required | integer | min:'.$request->exp_min_people,
                'exp_duration'=>'required',
                'exp_price'=>'required'
            )
        );

        $user = Auth::user();
        $exp = new Experiences;
        
        $exp->exp_name = $request->exp_name;
        $exp->exp_guide_id = $user->id;
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
        $exp->exp_published = 'Inactive';
        $exp->exp_flat = $request->exp_flat;

        $exp->save();

        return redirect()->route('experience_create_photos',array('id'=>$exp->id));
    }

    public function createPhotos($id)
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('experience.create_photos', array('user'=>$user,'id'=>$id));
        } else {
            return redirect('auth/login');
        }
    }

    public function storePhotos(Request $request)
    {
        $validator = $this->validate($request,
            array(
                'exp_photo'=>'required',
            )
        );
        $exp = App\Experiences::find($request->id);

        if ($request->file('exp_photo')){
            $filename = time().'.'.$request->file('exp_photo')->getClientOriginalExtension();
            Image::make($request->file('exp_photo'))->resize(300,300)->save( public_path('uploads/exp/'.$filename));
            $exp->exp_photo = $filename;
        }

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

        $exp->update();
        return redirect()->route('experience_create_schedule',array('id'=>$request->id));
    }

    public function createSchedule($id)
    {
        $user = Auth::user();
        return view('experience.create_schedule', array('user'=>$user,'id'=>$id));
    }

    public function storeSchedule(Request $request)
    {
        $validator = $this->validate($request,
            array(
                'exp_begin_date'=>'required',
                'exp_end_date'=>'required',
            )
        );
        $exp = App\Experiences::find($request->id);
        return redirect()->route('experience_create_payment',array('id'=>$request->id));
    }

    public function createPayment($id)
    {
        $user = Auth::user();
        $exp = App\Experiences::find($id);
        $docTypes = App\DocumentType::all(['id','documentType_name']);
        $documentTypes = [];
        foreach($docTypes as $docType){
            $documentTypes[$docType->id] = $docType->documentType_name;
        }
        return view('experience.create_payment', array('user'=>$user,'id'=>$id,'exp'=>$exp ,'documentTypes'=>$documentTypes));
    }

    public function storePayment(Request $request)
    {
        $validator = $this->validate($request,
            array(
            )
        );
        $exp = App\Experiences::find($request->id);
        $exp->update($request->all());
        return redirect()->route('experience_create_publish',array('id'=>$request->id));
    }

    public function createPublish($id)
    {
        $user = Auth::user();
        return view('experience.create_publish', array('user'=>$user,'id'=>$id));
    }

    public function storePublish(Request $request)
    {
        return redirect()->route('experience_show',array('id'=>$request->id));
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

        $exp_galleries = DB::table('experience_photos')
                ->where('experience_photos.exp_id',$id)
                ->get();

        return view('experience.show', array('user'=>$user,'exp'=>$exp,'exp_galleries'=>$exp_galleries));
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

        $experienceCategory = App\ExperiencesCategories::all(['id','category_name']);        
        $cat = [];
        foreach($experienceCategory as $category){
           $cat[$category->id] = $category->category_name;
        }

        $myexps = DB::table('experience')
            ->join('currency','experience.exp_currency','=','currency.id')
            ->where('experience.exp_guide_id',$user->id)
            ->orderBy('experience.created_at','desc')
            ->paginate(4);

        $exp_photos = DB::table('experience_photos')
            ->where('exp_id',$id)
            ->get();

        return view('experience.edit', array('user'=>Auth::user(),'exp'=>$exp,'cur'=>$cur,'cat'=>$cat,'myexps'=>$myexps, 'exp_photos'=>$exp_photos));
        } else {
            return redirect('auth/login');
        }
    }

    public function editBasic($id)
    {
        dd($id);
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

    public function changeStatus($id)
    {
        $exp = Experiences::find($id);
        if ($exp->exp_status == "Active"){
            $exp->exp_status = "Inactive";
        } else {
            $exp->exp_status = "Active";
        }
        $exp->save();
        return redirect()->route('my_experience'); 
    }

    public function changePublisehd($id)
    {
        $exp = Experiences::find($id);
        if ($exp->exp_published == "Active"){
            $exp->exp_published = "Inactive";
        } else {
            $exp->exp_published = "Active";
        }
        $exp->save();
        return redirect()->route('admin_experiences'); 
    }

}