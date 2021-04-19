<?php

namespace App\Http\Controllers;

use App\FrontView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FrontViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $value = FrontView::all();
            return view('Admin.Pages.front_view',compact('value'));
        }catch(\Exception $e){
            return redirect('/admin');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if ($request->hasFile('file')){
                $extension = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
                if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
                    $value = new FrontView();
                    $photo = $request->file->getClientOriginalName();
                    $request->file->storeAs('public/FrontView',$photo);
                    $value->filename = $photo;

                    $value->title = $request->title;
                    $value->status = "false";
                    $value->added_by = Auth::user()->name;
                    $value->save();
                    return back()->with('success','You have successfully add a photo.');
                }else{
                    return back()->with('error','Please upload only .jpeg, .jpg or .png');
                }
            }

        }catch(\Exception $e){
            return back()->with('error','Uploading Failed');
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
        try{
            $value = FrontView::find($id);
            File::delete(storage_path('app/public/FrontView/'.$value->filename));
            $value->delete();
            return back()->with('success','You have successfully delete');
        }catch(\Exception $e){
            return back()->with('error','Deleting Failed!!');
        }
    }

    public function statusEdit(Request $request)
    {

        try{
            $id = $request->s_id;
            $value = FrontView::all();
            foreach ($value as $v){
                if($v->id == $id){
                    DB::table('front_views')->where('id', $id)->update(['status' => "true"]);
                }else{
                    DB::table('front_views')->where('id', $v->id)->update(['status' => "false"]);
                }
            }
            return "Done";
        }catch(\Exception $e){
            return "fail";
        }
    }
}
