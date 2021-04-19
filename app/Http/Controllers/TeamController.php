<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Admin.Pages.team');
        try{
            $value = Team::all();
            if($value != null){
                return view('Admin.Pages.team', compact('value'));
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
            if ($request->hasFile('file')){
                $extension1 = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
                if($extension1 == "jpg" || $extension1 == "png" || $extension1 == "jpeg")
                {
                    $value = new Team();
                    $rand = rand();

                    $photo = strtolower($rand.$request->id.$request->file->getClientOriginalName());
                    $request->file->storeAs('public/Team',$photo);
                    $value->file = $photo;


                    $value->name = $request->name;
                    $value->description = ($request->description);
                    $value->added_by = Auth::user()->name;
                    $value->save();
                    return back()->with('success','You have successfully add information.');
                }else{
                    return back()->with('error','Please upload only .jpeg, .jpg or .png');
                }
            }

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
            $value = Team::find($id);
            File::delete(storage_path('app/public/Team/'.$value->file));
            $value->delete();
            return back()->with('success','You have successfully delete');
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }

    public function destroyPicture($id)
    {
        try{
            $value = Team::find($id);
            File::delete(storage_path('app/public/AllProducts/'.$value->file));
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }

    public function update_m(Request $request)
    {
        try{
            $id = $request->id;
            $name = $request->name;
            $description = ($request->description);
            $added_by = Auth::user()->name;
            $value = Team::find($id);
            if ($request->hasFile('file')) {
                $extension1 = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
                if($extension1 == "jpg" || $extension1 == "png" || $extension1 == "jpeg"
                ) {
                    $rand = rand();
                    $photo = strtolower($rand.$request->id.$request->file->getClientOriginalName());
                    $request->file->storeAs('public/Team',$photo);
                    $value->file = $photo;
                }
            }
            $value->name = $name;
            $value->description = $description;
            $value->added_by = $added_by;
            $value->save();

            return back()->with('success','You have successfully updated.');
        }catch(\Exception $e){
            return back()->with('error','Uploading Failed'.$e);
        }
    }

}
