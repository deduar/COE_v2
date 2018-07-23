<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\ExperiencesCategories;
use Auth;
use DB;
use App;
use Session;

class ExperienceCategoryController extends Controller
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
            $experienceCategories = DB::table('experience_category')
                ->orderBy('experience_category.created_at','asc')
                ->paginate(3);
            return view('admin.experienceCategory', array('user'=>Auth::user(),'experienceCategories'=>$experienceCategories));
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
        $user = Auth::user();
        return view('admin.experienceCategory_create', array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experienceCategory = new ExperiencesCategories;
        $experienceCategory->category_name = $request->category_name;
        $experienceCategory->save();        
        
        return redirect()->route('admin_experience_category');
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
        $user = Auth::user();
        $experienceCategory = ExperiencesCategories::find($id);
        return view('admin.experienceCategory_edit', array('user'=>Auth::user(), 'experienceCategory'=>$experienceCategory));
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
        $experienceCategory = ExperiencesCategories::find($request->id);
        $experienceCategory->update($request->all());
        return redirect()->route('admin_experience_category');
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

    public function changeStatusExperienceCategory($id)
    {
        $experienceCategory = ExperiencesCategories::find($id);
        if ($experienceCategory->category_status == "Active"){
            $experienceCategory->category_status = "Inactive";
        } else {
            $experienceCategory->category_status = "Active";
        }
        $experienceCategory->save();
        return redirect()->route('admin_experience_category'); 
    }

}
