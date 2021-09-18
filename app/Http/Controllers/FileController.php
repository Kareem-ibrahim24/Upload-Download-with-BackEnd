<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user=auth()->user()->id;
        $files =file::where('userId', '=', $user)->get();
       return view('files.index')->with('files',$files);

    }

  
    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $file =new file();
        $file->title=$request->title;
        $file->desc=$request->desc;
        // upload File
        $file_Data =$request->file('mainFile');
        $fileName =$file_Data->getClientOriginalName();
        $file_Data->move(public_path() .'/uploades/' , $fileName);
        $file->mainFile = $fileName;
        $file->UserId = $request->UserId;
        $file->save();
        return redirect('files');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $file =file::find($id);
        return view('files.show')->with('file',$file);

    }


    public function edit($id)
    {
        $file =file::find($id);
        return view('files.update')->with('file',$file);
    }


    public function update(Request $request, $id )
    {
        $file =file::find($id);
        $file->title=$request->title;
        $file->desc=$request->desc;
        // upload File
        $file_Data =$request->file('mainFile');
        $fileName =$file_Data->getClientOriginalName();
        $file_Data->move(public_path() .'/uploades/' , $fileName);
        $file->mainFile = $fileName;
        $file->save();
        return redirect('files');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file =file::find($id);
        $file->delete();
        return redirect('files');
    }

    public function download($id){
        $item=file::where('id',$id)->firstOrFail();
        $itempath =public_path("uploades/" .$item->mainFile);

        return  response()->download($itempath);
    }
}
