<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactInfoEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = ContactInfoEdit::all();
        $value1 = DB::table('contacts')->orderBy('created_at', 'desc')->paginate(15);
        $now = now();
        //return $now;
        return view('Admin.Pages.contact',compact('value', 'value1','now'));
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

            $ContactInfoEdit = ContactInfoEdit::all();
            $id = 0;
            foreach ($ContactInfoEdit as $a)
            {
                $id = $a->id;
                $this->destroy($a->id);
                break;
            }

            $value = new ContactInfoEdit();
            $value->id = $id;
            $value->link = $request->link;
            $value->message = $request->message;
            $value->added_by = Auth::user()->name;
            $value->save();
            return back()->with('success','You have successfully add new info.');
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
        $value = ContactInfoEdit::find($id);
        $value->delete();
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
//        //Result
//        return $smsresult;
//        //[ { "to": "+8801752217800", "message": "\u09b9\u09cd\u09af\u09be\u09b2\u09cb, SolacherBD \u0993\u099f\u09bf\u09aa\u09bf (OTP) \u0995\u09cb\u09a1\u0983 126589", "status": "SENT", "statusmsg": "SMS Sent Successfully To +8801752217800" } ]
//        //Error Display
//        //echo curl_error($ch);
//    }




    public function update_m(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $number = $request->number;
        $message = $request->message;
        $answer = $request->answer;
        $answered_by = Auth::user()->name;;


        $value = Contact::find($id);
        $value->id = $id;
        $value->name = $name;
        $value->number = $number;
        $value->message = $message;
        $value->answer = $answer;
        $value->answered_by = $answered_by;
        $value->status = "done";
        $sscsb = new SmsServiceSolacerBd();
        $response = $sscsb->messagesent($number,$answer);
        $value->response = $response;
//        $response = $this->messagesent($number,$answer);
//        $value->response = (json_decode($response, true)[0])["statusmsg"];
        $value->save();

//        var_dump($response);
//        return var_dump();
//        var_dump(json_decode($response, true)["statusmsg"]);

        return back()->with('success','You have successfully sent message to.'.$name);
    }
}
