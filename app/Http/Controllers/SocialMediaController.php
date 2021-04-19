<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Admin.Pages.social_media');
        try{
            $value = SocialMedia::all();
            if($value != null){
                return view('Admin.Pages.social_media', compact('value'));
            }else{
                return redirect('/admin');
            }
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
        try{
            $value = new SocialMedia();
            $value->name = $request->name;
            $value->link = $request->link;
            $value->added_by = Auth::user()->name;
            $value->save();
            return back()->with('success','You have successfully add information.');
        }catch(\Exception $e){
            return back()->with('error','Uploading Failed'.$e);
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
    public function destroy($id)
    {
        try{
            $value = SocialMedia::find($id);
            $value->delete();
            return back()->with('success','You have successfully delete');
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }
}
