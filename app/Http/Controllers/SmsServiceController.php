<?php

namespace App\Http\Controllers;

use App\CustomerUser;
use App\SmsServece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SmsServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $value = SmsServece::all();
        $value  = DB::table('sms_serveces')->orderBy('created_at', 'desc')->paginate(20);
        return view('Admin.Pages.sms_service',compact('value'));
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



//    public function messagesent($number, $mg){
//        $to = $number;
//        $token = "bf36c442e14f6b721c416a1988322952";
//        $message = $mg;
////        $message = "হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589";
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
//        //Result
//        return $smsresult;
//        //[ { "to": "+8801752217800", "message": "\u09b9\u09cd\u09af\u09be\u09b2\u09cb, SolacherBD \u0993\u099f\u09bf\u09aa\u09bf (OTP) \u0995\u09cb\u09a1\u0983 126589", "status": "SENT", "statusmsg": "SMS Sent Successfully To +8801752217800" } ]
//        //Error Display
//        //echo curl_error($ch);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $value = new SmsServece();
            $type = $request->type;
            if($type == "single"){
//                $response = $this->messagesent($request->number,$request->message);
                $sscsb = new SmsServiceSolacerBd();
                $response = $sscsb->messagesent($request->number,$request->message);
                $value->number = $request->number;
                $value->message = $request->message;
                $value->type = $request->type;
                $value->sent_by = Auth::user()->name;
                $value->response = $response;
                $value->save();
                return back()->with('success','You have successfully add information.');
            }
            else if($type == "group")
            {
                $sscsb = new SmsServiceSolacerBd();
                $response = $sscsb->messagesent($request->number,$request->message);
                $value->number = $request->number;
                $value->message = $request->message;
                $value->type = $request->type;
                $value->sent_by = Auth::user()->name;
                $value->response = $response;
                $value->save();
                return back()->with('success','You have successfully add information.');
            }
            else if($type == "all")
            {
                $value = CustomerUser::all();
                $number = '';
                for ($i = 0; $i < count($value); $i++ ){
                    if($i < count($value) - 1){
                        $number .= $value[$i]->phone.',';
                    }else{
                        $number .= $value[$i]->phone;
                    }
                }

                $value = new SmsServece();
                $sscsb = new SmsServiceSolacerBd();
                $response = $sscsb->messagesent($request->number,$request->message);
                $value->number = 'All Customers Number';
                $value->message = $request->message;
                $value->type = $request->type;
                $value->sent_by = Auth::user()->name;
                $value->response = $response;
                $value->save();
                return back()->with('success','You have successfully add information.');
            }

        }catch(\Exception $e){
            return back()->with('error','Sending Failed'.$e);
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
