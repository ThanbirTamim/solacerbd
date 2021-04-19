<?php
//$to = "01752217800";
//$token = "bf36c442e14f6b721c416a1988322952";
//$message = "হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589";
//
//$url = "http://api.greenweb.com.bd/api.php?json";
//
//
//$data= array(
//    'to'=>"$to",
//    'message'=>"$message",
//    'token'=>"$token"
//); // Add parameters in key value
//$ch = curl_init(); // Initialize cURL
//curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_ENCODING, '');
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$smsresult = curl_exec($ch);
//
////Result
//echo $smsresult;
////[ { "to": "+8801752217800", "message": "\u09b9\u09cd\u09af\u09be\u09b2\u09cb, SolacherBD \u0993\u099f\u09bf\u09aa\u09bf (OTP) \u0995\u09cb\u09a1\u0983 126589", "status": "SENT", "statusmsg": "SMS Sent Successfully To +8801752217800" } ]
////Error Display
//echo curl_error($ch);
//
//?>



@extends('customer.layouts.app')
@section('content')
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xm-2"></div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xm-8" style="font-family: 'Britannic Bold'; color: black; font-size: 19px">
                    <marquee>You need not to memorize any password. We provide OTP to your phone!!</marquee>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-2 col-xm-2"></div>
            </div>
            <div class="row" style="padding-bottom: 200px">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xm-8" style="background-image: linear-gradient(white,transparent); padding: 20px; border: 20px solid black; border-radius: 15px; color: black">
                    <center><h3>Login Form</h3></center>
                    <form class="form-group" action="/customer/login" method="post" onsubmit="loginFormSubmission();return false">
                        @csrf
                        <div class="input-container">
                            <i class="fa fa-phone icon"></i>
                            <input class="form-control form-control-sm" type="text" maxlength="11" id="customer_phone" name="customer_phone" placeholder="Your Phone.."><br>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-user-secret icon" id="icon" hidden></i>
                            <input class="form-control form-control-sm" id="otp" type="text" name="otp" maxlength="6" placeholder="Provide OTP.." style="visibility: hidden"><br>
                        </div>
                        <input type="submit" value="Send OTP" id="otpsubmit" class="btn btn-primary btn-sm">
                    </form>
                    {{--<button id="loginSubmit" value="Send OTP" class="btn btn-primary btn-sm" style="visibility: hidden; text-align: right; float: right">Login</button>--}}
                    <button id="loginSubmit" value="Send OTP" class="btn btn-primary btn-sm" style="visibility: hidden; text-align: right; float: right" onclick="loginFormSubmissionSession()">Login</button>
                    <br>
                    <a><div id="countdown" style="visibility: hidden; font-size: 13px" onclick="loginFormSubmission()">

                        </div></a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
            </div>
        </div>
    </div>
    <script>
        function loginFormSubmission() {
            alert("We are sending OTP to your phone!! it takes few seconds.....");
            document.getElementById("otp").style.visibility = "visible";

            document.getElementById("loginSubmit").style.visibility = "visible";
            document.getElementById("otpsubmit").style.visibility = "hidden";

            document.getElementById("countdown").style.visibility = "visible";

            otpSending();

            var timeleft = 30;
            var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    clearInterval(downloadTimer);
                    document.getElementById("countdown").innerHTML = "if you didn't get any OTP please click here (Send Again)";
                    document.getElementById("countdown").style.color = "red";
                    document.getElementById("countdown").style.cursor = "pointer";
                } else {
                    document.getElementById("countdown").style.color = "black";
                    document.getElementById("countdown").innerHTML = "Wait: "+ timeleft + " seconds (Message will be sent in while)";
                }
                timeleft -= 1;
            }, 1000);
        }


        function otpSending(){
            var customer_phone = document.getElementById("customer_phone").value;
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('customer_phone', customer_phone);
            $.ajax({
                async: false,
                crossDomain: true,
                url: "/customer/login/otp",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: 'multipart/form-data',
                data: form
            }).done(function (response) {
                // console.log(response);
                if(response == "success"){
                    // alert('success');
                    //window.open('/customer/dashboard', "_self")

                }else{
                    alert("Failed!!!! Try again later.");
                }
                // console.log(response);
            });
        }


        function loginFormSubmissionSession() {
            var customer_phone = document.getElementById("customer_phone").value;
            var otp = document.getElementById("otp").value;
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('customer_phone', customer_phone);
            form.append('otp', otp);
            $.ajax({
                async: false,
                crossDomain: true,
                url: "/customer/login",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: 'multipart/form-data',
                data: form
            }).done(function (response) {
                var data = response.split('%');
                // console.log(response);
                // console.log(data);
                if(data[0] == "success"){
                    var url = '/customer/dashboard/'+data[1];
                    window.open(url, "_self")

                }else{
                    alert("Failed!! Please provide valid OTP!!");
                }
                // console.log(response);
            });

        }
    </script>
@endsection
