<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\DocumentType;
use Auth;
use DB;
use App;
use Session;

class DocumentTypeController extends Controller
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
            $documentTypes = DB::table('document_type')
            ->orderBy('document_type.created_at','asc')
            ->paginate(3);
            return view('admin.documentType', array('user'=>Auth::user(),'documentTypes'=>$documentTypes));
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
        return view('admin.documentType_create', array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documentType = new DocumentType;        
        $documentType->documentType_name = $request->documentType_name;
        $documentType->save();        
        
        return redirect()->route('admin_document_type');
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
        $documentType = DocumentType::find($id);
        return view('admin.documentType_edit', array('user'=>Auth::user(), 'documentType'=>$documentType));
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
        $documentType = DocumentType::find($request->id);
        $documentType->update($request->all());
        return redirect()->route('admin_document_type');
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

    public function changeStatusDocumentType($id)
    {
        $docType = DocumentType::find($id);
        if ($docType->documentType_status == "Active"){
            $docType->documentType_status = "Inactive";
        } else {
            $docType->documentType_status = "Active";
        }
        $docType->save();
        return redirect()->route('admin_document_type'); 
    }

}
