<?php

namespace App\Http\Controllers\Users;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Post;
use Image;
use Mail;
use Config;
use App;
use Session;

use App\Experiences;
use DB;

class UsersController extends Controller
{

	public function __construct()
    {
    	App::setLocale(Session::get('locale'));
        $this->middleware('auth');
    }

    /*
     * Users Profile (show, form, update)
     */
	public function showProfile()
	{
		if(Auth::guest()){
			return Redirect::to('auth/login');
		} else {
			if (Auth::user()->confirmed != false) {
				$user = Auth::user();
				return view('user.profile', array('user'=>Auth::user()));
			} else{
				$user = Auth::user();
				return view('user.verify', array('user'=>Auth::user()));
			}
		}
	}


	public function verify($register_code){
        $user = Auth::user();
        if ($user->confirmed){
        	$user = Auth::user();
			return view('user.verify', array('user'=>Auth::user()));
        }else {
            if ($register_code == $user->register_code){
                $user->confirmed = TRUE;
                $user->save();

                $data = array ('name' => $user->name, 'email' => $user->email);

                Mail::send('emails.welcome', $data, function($message) use ($data){
                    $message->from(Config::get('constants.options.no_reply'), "Coexperiences");
                    $message->subject("Welcome to Coexperiences");
                    $message->to($data['email']);
                });

                return view('user.profile', array('user'=>Auth::user()));
            } else {
                return view('user.verify', array('user'=>Auth::user()));
            }
        }
    }
	public function editProfile()
	{
		if(Auth::guest()){
			return Redirect::to('auth.login');
		} else {
			if (Auth::user()->confirmed != false) {
				$user = Auth::user();
				$docTypes = App\DocumentType::all(['id','documentType_name']);
				$documentTypes = [];
        		foreach($docTypes as $docType){
           			$documentTypes[$docType->id] = $docType->documentType_name;
        		}
				return view('user.editProfile', array('user'=>Auth::user(),'documentTypes'=>$documentTypes));
			} else{
				$user = Auth::user();
				return view('user.verify', array('user'=>Auth::user()));
			}
		}
		
	}

	public function show()
	{
		$user = Auth::user();
		$myexps = DB::table('experience')
			->join('currency','experience.exp_currency','=','currency.id')
			->select('experience.id as exp_id', 'exp_name','exp_photo','exp_price','cur_name','cur_simbol','exp_location','exp_min_people','exp_max_people','exp_duration','exp_duration_h','experience.exp_status','experience.id')
			->where('experience.exp_guide_id',$user->id)
			->orderBy('experience.created_at','desc')
			->paginate(4);
		return view('user.show', array('user'=>Auth::user(),'myexps'=>$myexps));
	}

	public function updateProfile(Request $request)
	{
	  	$user = Auth::user();
		$user->update($request->all());
		$myexps = DB::table('experience')
			->join('currency','experience.exp_currency','=','currency.id')
			->select('experience.id as exp_id', 'exp_name','exp_photo','exp_price','cur_name','cur_simbol','exp_location','exp_min_people','exp_max_people','exp_duration','exp_duration_h')
			->where('experience.exp_guide_id',$user->id)
			->orderBy('experience.created_at','desc')
			->paginate(4);
		return view('user.show', array('user'=>Auth::user(),'myexps'=>$myexps));
	}
	
	public function uploadAvatar(Request $request)
	{
		App::setLocale(Session::get('locale'));
		if($request->hasFile('avatar'))
		{
			$avatar = $request->file('avatar');
			$filename = time().'.'.$avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300,300)->save( public_path('uploads/avatars/'.$filename));
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();
			$myexps = DB::table('experience')
			->join('currency','experience.exp_currency','=','currency.id')
			->where('experience.exp_guide_id',$user->id)
			->orderBy('experience.created_at','desc')
			->paginate(4);
			return redirect('user/show');
			//return view('user.show', array('user'=>Auth::user(),'myexps'=>$myexps));
		}
	}

	/*
	 * Users Password(update, recovery)
	 */
	public function editPassword()
	{
		if(Auth::guest()){
			return Redirect::to('auth/login');
		} else {
			if (Auth::user()->confirmed != false) {
				$user = Auth::user();
				return view('user.editPassword', array('user'=>Auth::user()));
			} else {
				$user = Auth::user();
				return view('user.verify', array('user'=>Auth::user()));
			}
		}
	}
	public function updatePassword(Request $request)
	{
	  	$user = Auth::user();
		$user->update($request->all());
		return redirect('user/show');
		//return view('user.profile', array('user'=>Auth::user()));
	}

	
	public function resend()
	{
		$user = Auth::user();

        $data = array ('name' => $user->name, 'email' => $user->email, 'register_code' => $user->register_code);

        Mail::send('emails.validate', $data, function($message) use ($data)
        {
            $message->from('no-reply@site.com', "Coexperiences");
            $message->subject("Register into Coexperiences");
            $message->to($data['email']);
        });

        \Session::flash('resend_message','A mail with instructions was sent to you email.');

        return view('user.verify', array('user'=>Auth::user()));
	}

	public function inviteFriend()
    {
        $user = Auth::user();
        return view('user.inviteFriend', array('user'=>$user = Auth::user()));   
    }

}