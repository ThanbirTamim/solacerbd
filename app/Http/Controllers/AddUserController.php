<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $value = User::all();
            if($value != null){
                if(Auth::user()->role == 0){
                    return view('Admin.Pages.add_user',compact('value'));
                }else{
                    return redirect('/admin');
                }
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
        //'password' => Hash::make($data['password']),
        try{
            $value = new User();
            $value->name = $request->name;
            $value->email = $request->email;
            $value->role = $request->role;
            $value->password = Hash::make($request->password);
            $value->save();
            return back()->with('success','You have successfully add information.');
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
            $value = User::find($id);
            $value->delete();
            return back()->with('success','You have successfully delete');
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }
}
