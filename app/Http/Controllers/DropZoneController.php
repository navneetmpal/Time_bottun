<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class DropZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $gallery = Gallery::get();
        return view('gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());

        if($request->hasFile('file')){

        $uploadPath = "uploads/gallery/";

        $file = $request->file('file');

        $extention = $file->getClientOriginalExtension();
        $filename = time().'-'.rand(0,99).'.'.$extention;
        $file->move($uploadPath, $filename);

        $finalImageName = $uploadPath.$filename;

        Gallery::create([
            'image' => $finalImageName
        ]);

        return response()->json(['success' => 'Image Uploaded Successfully']);
        }
        else
        {
            return response()->json(['error' => 'File upload failed.']);
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
    public function destroy($id){
        echo "<pre>";
        print_r($id);
        // $gallery = Gallery::where('id', $id)->first();
        // if(File::exists($gallery->image)){
        //     File::delete($gallery->image);
        // }
        // $gallery->delete();
        // return redirect()->back()->with('status', 'Image deleted');
    }
}
