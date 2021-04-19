<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Pages.password_reset');
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
            $id = Auth::user()->id;
            $value = User::find($id);
//
//            $hash1 = Hash::make('1234'); // A hash is generated
//            $hash2 = Hash::make('1234'); // Another hash is generated that differs from the first one

//            return var_dump(Hash::check(trim($request->old_password), $value->password));
            $value->password = Hash::make($request->new_password);
            $value->save();
            return back()->with('success','You have successfully changed password');

//            if(Hash::make(trim($request->old_password)) == $value->password){
//
//            }else{
//                return Hash::make($request->old_password);
//                return back()->with('error','You provide wrong old password');
//            }

        }catch (\Exception $e){
            return back()->with('error','Fail');
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
        //
    }
}
