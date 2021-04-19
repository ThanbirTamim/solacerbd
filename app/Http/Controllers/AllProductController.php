<?php

namespace App\Http\Controllers;

use App\AllProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AllProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $value = DB::table('all_products')->orderBy('created_at', 'desc')->paginate(10);
            if($value != null){
                return view('Admin.Pages.all_products', compact('value'));
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

            if ($request->hasFile('file1') && $request->hasFile('file2') && $request->hasFile('file3') && $request->hasFile('file4') && $request->hasFile('file5') && $request->hasFile('file6')){
                $extension1 = pathinfo($request->file1->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension2 = pathinfo($request->file2->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension3 = pathinfo($request->file3->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension4 = pathinfo($request->file4->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension5 = pathinfo($request->file5->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension6 = pathinfo($request->file6->getClientOriginalName(), PATHINFO_EXTENSION);
                if($extension1 == "jpg" || $extension1 == "png" || $extension1 == "jpeg" &&
                    $extension2 == "jpg" || $extension2 == "png" || $extension2 == "jpeg" &&
                    $extension3 == "jpg" || $extension3 == "png" || $extension3 == "jpeg" &&
                    $extension4 == "jpg" || $extension4 == "png" || $extension4 == "jpeg" &&
                    $extension5 == "jpg" || $extension5 == "png" || $extension5 == "jpeg" &&
                    $extension6 == "jpg" || $extension6 == "png" || $extension4 == "jpeg"
                ){
                    $value = new AllProducts();
                    $rand = rand();

                    $photo1 = strtolower($rand.$request->id.$request->file1->getClientOriginalName());
                    $request->file1->storeAs('public/AllProducts',$photo1);
                    $value->file1 = $photo1;

                    $photo2 = strtolower($rand.$request->id.$request->file2->getClientOriginalName());
                    $request->file2->storeAs('public/AllProducts',$photo2);
                    $value->file2 = $photo2;

                    $photo3 = strtolower($rand.$request->id.$request->file3->getClientOriginalName());
                    $request->file3->storeAs('public/AllProducts',$photo3);
                    $value->file3 = $photo3;

                    $photo4 = strtolower($rand.$request->id.$request->file4->getClientOriginalName());
                    $request->file4->storeAs('public/AllProducts',$photo4);
                    $value->file4 = $photo4;

                    $photo5 = strtolower($rand.$request->id.$request->file5->getClientOriginalName());
                    $request->file5->storeAs('public/AllProducts',$photo5);
                    $value->file5 = $photo5;

                    $photo6 = strtolower($rand.$request->id.$request->file6->getClientOriginalName());
                    $request->file6->storeAs('public/AllProducts',$photo6);
                    $value->file6 = $photo6;


                    $value->name = $request->name;
                    $value->price = intval($request->price);
//                $value->max_size = intval($request->max_size);
//                $value->min_size = intval($request->min_size);
                    $value->size_type = ($request->size_type);
                    $value->age_type = strtolower($request->age_type);
                    $value->product_type = strtolower($request->product_type);
                    $value->fabric = strtolower($request->fabric_type);
                    $value->description = ($request->description);
                    $value->gender_type = ($request->gender_type);
                    $value->added_by = Auth::user()->name;
                    $value->tag = strtolower($request->tag);
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
            $value = AllProducts::find($id);
            File::delete(storage_path('app/public/AllProducts/'.$value->file1));
            File::delete(storage_path('app/public/AllProducts/'.$value->file2));
            File::delete(storage_path('app/public/AllProducts/'.$value->file3));
            File::delete(storage_path('app/public/AllProducts/'.$value->file4));
            File::delete(storage_path('app/public/AllProducts/'.$value->file5));
            File::delete(storage_path('app/public/AllProducts/'.$value->file6));
            $value->delete();
            return back()->with('success','You have successfully delete');
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }


    public function destroyPicture($id)
    {
        try{
            $value = AllProducts::find($id);
            File::delete(storage_path('app/public/AllProducts/'.$value->file1));
            File::delete(storage_path('app/public/AllProducts/'.$value->file2));
            File::delete(storage_path('app/public/AllProducts/'.$value->file3));
            File::delete(storage_path('app/public/AllProducts/'.$value->file4));
            File::delete(storage_path('app/public/AllProducts/'.$value->file5));
            File::delete(storage_path('app/public/AllProducts/'.$value->file6));
        }catch (\Exception $e){
            return redirect('/admin');
        }
    }


    public function update_m(Request $request)
    {
        try{
            $id = $request->id;
            $name = $request->name;
            $price = intval($request->price);
            $size_type = ($request->size_type);
            $age_type = strtolower($request->age_type);
            $product_type = strtolower($request->product_type);
            $fabric = strtolower($request->fabric_type);
            $description = ($request->description);
            $gender_type = ($request->gender_type);
            $added_by = Auth::user()->name;
            $tag = strtolower($request->tag);

            $value = AllProducts::find($id);

            if ($request->hasFile('file1') && $request->hasFile('file2') && $request->hasFile('file3') && $request->hasFile('file4') && $request->hasFile('file5') && $request->hasFile('file6')) {

                //before update pic have to delete only all pic under this id
                $extension1 = pathinfo($request->file1->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension2 = pathinfo($request->file2->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension3 = pathinfo($request->file3->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension4 = pathinfo($request->file4->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension5 = pathinfo($request->file5->getClientOriginalName(), PATHINFO_EXTENSION);
                $extension6 = pathinfo($request->file6->getClientOriginalName(), PATHINFO_EXTENSION);
                if($extension1 == "jpg" || $extension1 == "png" || $extension1 == "jpeg" &&
                    $extension2 == "jpg" || $extension2 == "png" || $extension2 == "jpeg" &&
                    $extension3 == "jpg" || $extension3 == "png" || $extension3 == "jpeg" &&
                    $extension4 == "jpg" || $extension4 == "png" || $extension4 == "jpeg" &&
                    $extension5 == "jpg" || $extension5 == "png" || $extension5 == "jpeg" &&
                    $extension6 == "jpg" || $extension6 == "png" || $extension4 == "jpeg"
                ) {
                    $this->destroyPicture($id);


                    $rand = rand();

                    $photo1 = strtolower($rand.$request->id.$request->file1->getClientOriginalName());
                    $request->file1->storeAs('public/AllProducts', $photo1);
                    $value->file1 = $photo1;

                    $photo2 = strtolower($rand.$request->id.$request->file2->getClientOriginalName());
                    $request->file2->storeAs('public/AllProducts', $photo2);
                    $value->file2 = $photo2;

                    $photo3 = strtolower($rand.$request->id.$request->file3->getClientOriginalName());
                    $request->file3->storeAs('public/AllProducts', $photo3);
                    $value->file3 = $photo3;

                    $photo4 = strtolower($rand.$request->id.$request->file4->getClientOriginalName());
                    $request->file4->storeAs('public/AllProducts', $photo4);
                    $value->file4 = $photo4;

                    $photo5 = strtolower($rand.$request->id.$request->file5->getClientOriginalName());
                    $request->file5->storeAs('public/AllProducts', $photo5);
                    $value->file5 = $photo5;

                    $photo6 = strtolower($rand.$request->id.$request->file6->getClientOriginalName());
                    $request->file6->storeAs('public/AllProducts', $photo6);
                    $value->file6 = $photo6;

                }
            }

            $value->name = $name;
            $value->price = $price;
            $value->size_type = $size_type;
            $value->age_type = $age_type;
            $value->product_type = $product_type;
            $value->fabric = $fabric;
            $value->description = $description;
            $value->gender_type = $gender_type;
            $value->added_by = $added_by;
            $value->tag = $tag;
            $value->save();

            return back()->with('success','You have successfully updated.');
        }catch(\Exception $e){
            return back()->with('error','Uploading Failed');
        }
    }
}
