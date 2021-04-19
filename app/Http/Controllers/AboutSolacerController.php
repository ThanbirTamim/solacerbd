<?php

namespace App\Http\Controllers;

use App\AboutSolacer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AboutSolacerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $value = AboutSolacer::all();
            if($value != null){
                return view('Admin.Pages.about_solacer', compact('value'));
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
            //here we will delete the previous one
            $aboutsolacer = AboutSolacer::all();
            $id = 0;
            foreach ($aboutsolacer as $a)
            {
                $id = $a->id;
                $this->destroy($a->id);
                break;
            }

            $extension1 = pathinfo($request->file1->getClientOriginalName(), PATHINFO_EXTENSION);
            $extension2 = pathinfo($request->file2->getClientOriginalName(), PATHINFO_EXTENSION);
            $extension3 = pathinfo($request->file3->getClientOriginalName(), PATHINFO_EXTENSION);
            if($extension1 == "jpg" || $extension1 == "png" || $extension1 == "jpeg" && $extension2 == "jpg" || $extension2 == "png" || $extension2 == "jpeg" && $extension3 == "jpg" || $extension3 == "png" || $extension3 == "jpeg"){
                $value = new AboutSolacer();
                if ($request->hasFile('file1') && $request->hasFile('file2') && $request->hasFile('file3')){
                    $photo1 = $request->file1->getClientOriginalName();
                    $request->file1->storeAs('public/AboutSolacer',$photo1);
                    $value->file1 = $photo1;

                    $photo2 = $request->file2->getClientOriginalName();
                    $request->file2->storeAs('public/AboutSolacer',$photo2);
                    $value->file2 = $photo2;

                    $photo3 = $request->file3->getClientOriginalName();
                    $request->file3->storeAs('public/AboutSolacer',$photo3);
                    $value->file3 = $photo3;
                }

                $value->heading = $request->heading;
                $value->description = $request->description;
                $value->added_by = Auth::user()->name;
                $value->id = $id;
                $value->save();
                return back()->with('success','You have successfully add information.');
            }else{
                return back()->with('error','Please upload only .jpeg, .jpg or .png');
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
            $value = AboutSolacer::find($id);
            File::delete(storage_path('app/public/AboutSolacer/'.$value->file1));
            File::delete(storage_path('app/public/AboutSolacer/'.$value->file2));
            File::delete(storage_path('app/public/AboutSolacer/'.$value->file3));
            $value->delete();
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }
}
