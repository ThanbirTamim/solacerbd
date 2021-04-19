<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $value = Order::orderBy('created_at', 'desc')->paginate(20);
            return view('Admin.Pages.order',compact('value'));
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
            $id = $request->id;
            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
            $value = Order::find($id);
            $value->delivery_status = $delivery_status;
            $value->payment_status = $payment_status;
            $value->added_by = Auth::user()->name;
            $value->updated_at = now();
            $value->save();
            return back()->with('success','You have successfully updated.');
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
        try{
            $item = Order::find($id);;
            return view('Admin.Pages.order_details',compact('item'));
        }catch(\Exception $e){
            return redirect('/admin');
        }
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

    public function message(Request $request){
        try{
            $id = $request->id;
            $name = $request->name;
            $number = $request->number;
            $answer = $request->answer;
            $value = Order::find($id);
            $value->added_by = Auth::user()->name;
            $value->updated_at = now();
//            $response = $this->messagesent($number, $answer);
            $sscsb = new SmsServiceSolacerBd();
            $response = $sscsb->messagesent($number,$answer);
            $value->response = $response;
            $value->save();
            return back()->with('success','You have successfully sent message; Please Check response (if need)');
        }catch(\Exception $e){
            return back()->with('error','Failed.');
        }
    }

//    private function messagesent($number, $mg){
//        $to = $number;
//        $token = "bf36c442e14f6b721c416a1988322952";
//        $message = $mg;
//        $url = "http://api.greenweb.com.bd/api.php?json";
//        $data= array(
//            'to'=>"$to",
//            'message'=>"$message",
//            'token'=>"$token"
//        ); // Add parameters in key value
//        $ch = curl_init(); // Initialize cURL
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_ENCODING, '');
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $smsresult = curl_exec($ch);
//        $smsresult = (json_decode($smsresult, true)[0])["statusmsg"];
//        return $smsresult;
//    }
}
