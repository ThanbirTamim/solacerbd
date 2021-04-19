<?php

namespace App\Http\Controllers;

use App\AboutSolacer;
use App\AllProducts;
use App\Contact;
use App\ContactInfoEdit;
use App\CustomerUser;
use App\FrontView;
use App\Order;
use App\SocialMedia;
use App\Team;
use App\TempProductBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct(){
        session_start();
    }

    public function index(){
        try{
//            $getUserByEmail = DB::select('SELECT * FROM users WHERE email = ?' , ['useremailaddress@email.com']);
            $frontView = DB::table('front_views')->where('status', 'true')->first();
            $aboutSolacer = AboutSolacer::take(1)->first();
            $AllProducts = AllProducts::all()->take(5);
            $AllProducts2 = DB::table('all_products')->orderBy('id', 'desc')->take(8)->get();
            $BestSelling = AllProducts::inRandomOrder()->limit(3)->get();
            $Team = Team::all();
            $socialmedia = SocialMedia::all();
//            return var_dump($AllProducts);
            return view('customer.solacer_home',compact('frontView','aboutSolacer','AllProducts','AllProducts2','BestSelling','Team','socialmedia'));
        }catch(\Exception $e){
            return view('customer.Error.error');
        }

    }
    public function contact(){
        try{
            $value = ContactInfoEdit::take(1)->first();
            return view('customer.contact',compact('value'));
        }catch(\Exception $e){
            return view('customer.Error.error');
        }
    }

    public function contactSubmit(Request $request){

        try{

            $value = new Contact();
            $value->name = $request->name;
            $value->number = $request->mobile;
            $value->message = $request->message;
            $value->save();
            return back()->with('success','You have successfully sent message. We will contact you soon.');
        }catch(\Exception $e){
            return $e;
            return back()->with('error','Uploading Failed'.$e);
        }

    }

    public function allProduct()
    {
        $allproduct = DB::table('all_products')->orderBy('created_at', 'desc')->paginate(16);
        return view('customer.all_products',compact('allproduct'));
    }

    public function singlepage($id) {
        $item = AllProducts::find($id);
        return view('customer.single_item',compact('item'));
    }

    public function responseCreator($allproduct){
        $output = '';
        foreach ($allproduct as $item){
            $output .= '<div class="card">';
            $output .= '<img src="/storage/AllProducts/'.$item->file1.'" style="width: 13rem; height: 17rem"/>
                    <div class="card-img-overlay">
                         <div class="bottom-text">';
            $output .= '<h5 class="card-title">'.$item->name.'</h5>';
            $output .= '<a style="text-align: left; color: dodgerblue; font-weight: bold; font-size: 0.7rem" class="card-text" href="/all-products/'.$item->id.'" >See Details</a>
                         </div>
                    </div>
                </div>';
        }
        return $output;
    }

    public function search(Request $request){

        if($request->get('data') == 'all'){
            $allproduct = AllProducts::all();
            $response = $this->responseCreator($allproduct);
            return $response;
        }
        else
        {
            if($request->get('data') == 'price')
            {
                if($request->get('value') == "0")
                {
                    $allproduct = AllProducts::all();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "1")
                {
                    $allproduct = AllProducts::where('price', '>', 1)->where('price', '<=', 750)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "2")
                {
                    $allproduct = AllProducts::where('price', '>', 751)->where('price', '<=', 1500)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "3")
                {
                    $allproduct = AllProducts::where('price', '>', 1500)->where('price', '<=', 2500)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "4")
                {
                    $allproduct = AllProducts::where('price', '>', 2500)->where('price', '<=', 5000)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "5")
                {
                    $allproduct = AllProducts::where('price', '>', 5000)->where('price', '<=', 10000)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "6")
                {
                    $allproduct = AllProducts::where('price', '>', 10000)->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
            }
            else if($request->get('data') == 'age')
            {
                if($request->get('value') == "0")
                {
                    $allproduct = AllProducts::all();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "all")
                {
                    $allproduct = AllProducts::where('age_type', '=', "all")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "child")
                {
                    $allproduct = AllProducts::where('age_type', '=', "child")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "adolescence")
                {
                    $allproduct = AllProducts::where('age_type', '=', "adolescence")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "adult")
                {
                    $allproduct = AllProducts::where('age_type', '=', "adult")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "senior adult")
                {
                    $allproduct = AllProducts::where('age_type', '=', "senior adult")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
            }
            else if($request->get('data') == 'product')
            {
                if($request->get('value') == "0")
                {
                    $allproduct = AllProducts::all();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "shirts")
                {
                    $allproduct = AllProducts::where('product_type', '=', "shirts")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
                else if($request->get('value') == "shrugs")
                {
                    $allproduct = AllProducts::where('product_type', '=', "shrugs")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "tops")
                {
                    $allproduct = AllProducts::where('product_type', '=', "tops")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "pant")
                {
                    $allproduct = AllProducts::where('product_type', '=', "pant")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "knit trouser")
                {
                    $allproduct = AllProducts::where('product_type', '=', "knit trouser")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "crop tops")
                {
                    $allproduct = AllProducts::where('product_type', '=', "crop tops")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "tee shirt")
                {
                    $allproduct = AllProducts::where('product_type', '=', "tee shirt")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "fatua")
                {
                    $allproduct = AllProducts::where('product_type', '=', "fatua")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "panjabi")
                {
                    $allproduct = AllProducts::where('product_type', '=', "panjabi")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "formal shirt")
                {
                    $allproduct = AllProducts::where('product_type', '=', "formal shirt")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "hoodie")
                {
                    $allproduct = AllProducts::where('product_type', '=', "hoodie")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "dresses")
                {
                    $allproduct = AllProducts::where('product_type', '=', "dresses")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "jumpsuit")
                {
                    $allproduct = AllProducts::where('product_type', '=', "jumpsuit")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "sweater")
                {
                    $allproduct = AllProducts::where('product_type', '=', "sweater")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "jacket")
                {
                    $allproduct = AllProducts::where('product_type', '=', "jacket")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }else if($request->get('value') == "wrap tops")
                {
                    $allproduct = AllProducts::where('product_type', '=', "wrap tops")->get();
                    $response = $this->responseCreator($allproduct);
                    return $response;
                }
            }
            else if ($request->get('data') == 'keyword')
            {
                $value = $request->get('value');
                $value2 = strtolower($request->get('value'));
                $allproduct = AllProducts::where('product_type', '=', "wrap tops")
                    ->where('product_type', '=', $value)
                    ->orWhere('tag', 'LIKE', '%'.$value2.'%')
                    ->orWhere('name', 'LIKE', '%'.$value.'%')
                    ->orWhere('product_type', 'LIKE', '%'.$value.'%')
                    ->orWhere('description', 'LIKE', '%'.$value.'%')
                    ->orWhere('fabric', 'LIKE', '%'.$value.'%')
                    ->orWhere('age_type', 'LIKE', '%'.$value.'%')
                    ->orWhere('size_type', 'LIKE', '%'.$value.'%')
                    ->orWhere('price', 'LIKE', '%'.$value.'%')
                    ->get();
                $response = $this->responseCreator($allproduct);
                return $response;
            }
        }
//        $allproduct = DB::table('all_products')->orderBy('created_at', 'desc')->paginate(5);



//
//        $keyword = $request->keyword;
//        $price = $request->price;
//        $age = $request->age;
//        $product = $request->product;
//        if($keyword == null && $price == "0" && $age == "0" && $product == "0")
//        {
//            $allproduct = DB::table('all_products')->orderBy('created_at', 'desc')->paginate(16);
//            return view('customer.all_products',compact('allproduct'));
//        }
//        else if($keyword == null && $price == "0" && $age == "0" && $product == "0")
//        {
//            $allproduct = DB::table('all_products')->orderBy('created_at', 'desc')->paginate(16);
//            return view('customer.all_products',compact('allproduct'));
//        }
//
//        $sqlQuery = "SELECT * FROM all_products";
//        $allproduct = DB::select(DB::raw($sqlQuery));
//        return view('customer.all_products',compact('allproduct'));
    }

    public function membership(){
        return view('customer.customer_membership');
    }
    public function membershipSubmit(Request $request){
//        return $request;

        try{
            $value = new CustomerUser();
            $value->name = $request->customer_name;
            $value->phone = $request->customer_phone;
            $value->age = $request->age;
            $value->gender = $request->gender;
            $value->fb_link = $request->social_media_link;
            $value->address = $request->address;
            $value->save();
            return back()->with('success','You have successfully registered. You can easily login with your phone now!!!.');
        }catch(\Exception $e){
            return back()->with('error','Registration Failed!!! Check your phone number or try again later');
        }

        //return view('customer.customer_membership');
    }

    public function login(){
        if(!isset($_SESSION['valid'])){
            return view('customer.customer_login');
        }else{
            return redirect('/customer/dashboard');
        }
    }

    public function loginOTPSend(Request $request){

        try{
            $number = $request->get('customer_phone');
            $six_digit_random_number = mt_rand(100000, 999999);
            CustomerUser::where(['phone' => $number])->update([
                'password' => $six_digit_random_number,
            ]);
            $message = "হ্যালো, SolacherBD ওটিপি (6 digits OTP) কোডঃ ".$six_digit_random_number;
//            $this->messagesent($number, $message);
            $sscsb = new SmsServiceSolacerBd();
            $sscsb->messagesent($number, $message);
            return 'success';
        }catch(\Exception $e){
            return 'fail';
        }
    }


    public function loginSubmit(Request $request){
        try{

            $valid = CustomerUser::where('phone', '=', $request->get('customer_phone'))
                ->where('password', '=', $request->get('otp'))
                ->get();
            $phone = '';
//            echo 'ok: '.$request->get('customer_phone').'';
            foreach ($valid as $v){
                $phone = $v->phone;
            }
//            if(count($valid)>0){
            if($valid != null){

//            session_start();
                $_SESSION['valid'] = "valid";
                $_SESSION['phone'] = $phone;

                return 'success'.'%'.$phone;
            }else{
                return 'fail';
            }
        }catch (\Exception $e){
            return 'fail';
        }

    }

    public function dashboard($id){

        if(!isset($_SESSION)){
            session_start();
        }
//        return $_SESSION['valid'];
        if(isset($_SESSION['valid'])){
            if($_SESSION['phone'] == $id){
                $value = Order::where('phone', '=', $id)->paginate(20);
                return view('customer.customer_home',compact('value'));
            }else{
                return redirect('/error');
            }
        }else{
            return redirect('/customer/login');
        }
    }
    public function logoutSubmit(){
        $_SESSION['valid'] = "invalid";
//        return $_SESSION['valid'];
//        unset($_SESSION['username']);
        session_destroy();
//        session_destroy();
        return redirect('/');
    }


    public function tempBag(Request $request){

        try{
            $value = new TempProductBag();
            $value->session_id = $request->session_id;
            $value->product_id = $request->product_id;
            $value->quantity = $request->quantity;
            $value->size_type = $request->size_type;
            $value->save();
            return 'success';
        }catch(\Exception $e){
            return 'fail';
        }

    }

    public function cart(){
        return view('customer.order_page');
    }

    public function cartPost(Request $request){

        $value = TempProductBag::where('session_id', '=', $request->get('session_id'))->get();
        $items = array();
        $quantity = array();
        $size_type = array();
        foreach($value as $i) {
            $items[] = $i->product_id;
            $quantity[] = $i->quantity;
            $size_type[] = $i->size_type;
        }
        $quantityTrack = 0;

        $allselectedData = AllProducts::whereIn('id', (array) $items)->get();
        $subtotal = 0;
        $vat = 0; //15%
        $shipping = 100; //60tk
        $net = 0;

        $id_name_quantity_price = '';



        $output = '';

        $output .='<table class="table">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Item</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($allselectedData as $item){

            $id_name_quantity_price .= 'Product ID: '.$item->id.', Product Name:'.$item->name.', Quantity: '.$quantity[$quantityTrack]. ', Size: '. $size_type[$quantityTrack]. ', Price: '.intval($quantity[$quantityTrack])*($item->price).'||||| ';

            //                           <td><input readonly id="quantity" size="50" type="number" min="1" max="100" value="'.$quantity[$quantityTrack].'"/></td>
            $output .='<tr style="text-align: center">
                           <td><img src="/storage/AllProducts/'.$item->file1.'" width="50px" height="70px"></td>
                           <td>'.$item->name.'</td>
                           <td>'.$quantity[$quantityTrack].'</td>
                           <td>'.$item->price.'</td>
                           <td>'.strtoupper($size_type[$quantityTrack]).'</td>';
//                           <td><select onchange="sizeChange(this)" name="size_type" id="size_type" value="'.$size_type[$quantityTrack].'">'
//                if($size_type[$quantityTrack] == "xs"){
//                    $output .= '<option value="xs" selected>XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "m"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m" selected>M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "l"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l" selected>L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "xl"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl" selected>XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "xxl"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl" selected>XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "xxxl"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl" selected>XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }else if($size_type[$quantityTrack] == "4xl"){
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l">L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl" selected>4XL</option>';
//                }else{
//                    $output .= '<option value="xs">XS</option>
//                                    <option value="m">M</option>
//                                    <option value="l" selected>L</option>
//                                    <option value="xl">XL</option>
//                                    <option value="xxl">XXL</option>
//                                    <option value="xxxl">XXXL</option>
//                                    <option value="4xl">4XL</option>';
//                }

                                $output .= '</select></td>
                            <td><button type="submit" class="btn btn-danger btn-sm" id="remove" onclick="removeID(this)" value="'.$item->id.'" >Remove</button></td>
                        </tr>';
            $quantityTrack++;
            $subtotal = $subtotal + $item->price;

        }
        $output .='
                        </tbody>
                    </table>';

        $vat = (15*$subtotal)/100;
        $net = $shipping + $vat + $subtotal;
        $discount = ($subtotal*5)/100;
        $net = $net - $discount;

        $output .= "%TK ".$subtotal."%TK ".$shipping."%TK ".$vat."%TK ".$net."%".$id_name_quantity_price."%".$discount;

        return $output;
    }
    public function cartOrder(Request $request){

        try{
            if($request->product_id_name_quantity != null){
                $value = new Order();
                $value->session_id = $request->session_id;
                $value->product_id_name_quantity = $request->product_id_name_quantity;
                $value->net_price = $request->net_price;
                $value->subtotal_price = $request->subtotal_price;
                $value->vat_price = $request->vat_price;
                $value->shipping_price = $request->shipping_price;
                $value->payment_status = 'undone';
                $value->delivery_status = 'undone';
                $value->discount = $request->discount;

                $value->name = $request->customer_name;
                $value->phone = $request->customer_phone;
                $value->comment = $request->comment;
                $value->address = $request->address;
                $message = "প্রিয় গ্রাহক, আপনার অর্ডারটি গ্রহণ হয়েছে, আপনার Transaction ID: ".$request->session_id." অর্ডারটি বিস্তারিত জানতে Login করুন , ধন্যবাদ।";

                $sscsb = new SmsServiceSolacerBd();
                $response = $sscsb->messagesent($request->customer_phone, $message);
//                $response = $this->messagesent($request->customer_phone, $message);
                $value->response = $response;
                $value->save();


                $phonefind = CustomerUser::where(['phone' => $request->customer_phone])->first();
                if($phonefind != null){
                    return back()->with('success','You have successfully ordered; Check your phone we are sending confirmation; We will call you soon.');
                }else{
                    $value = new CustomerUser();
                    $value->name = $request->customer_name;
                    $value->phone = $request->customer_phone;
                    $value->address = $request->address;
                    $value->save();
                    return back()->with('success','You have successfully ordered');
                }
            }else{
                return back()->with('error','Failed!!!!! Your Cart is null!!');
            }


        }catch(\Exception $e){
            return back()->with('error','Failed!!');
//            return $e;
        }
//            return "ok";

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



    public function cartProductRemove (Request $request)
    {
        try{
            TempProductBag::where(['session_id' => $request->get('session_id'), 'product_id' => $request->get('product_id')])->first()->delete();
            return 'success';
        }catch(\Exception $e){
            return 'fail'.$e;
        }
    }


    public function cartRemove(Request $request)
    {
        try{
            $_SESSION['id'] = rand().date('Y-m-d H:i:s');
            session_destroy();
            return 'success';
        }catch (\Exception $e){
            return 'fail';
        }
    }




}
