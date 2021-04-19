<?php
if(!isset($_SESSION)){
    session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = rand().date('Y-m-d H:i:s');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="solacer">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('img/shop.ico')}}">
    <link rel="shortcut icon" href="{{asset('img/shop.ico')}}" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Solacer BD</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        #fixedbutton {
            position: fixed;
            bottom: 0px;
            right: 0px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>


</head>
<body>
{{--navbar--}}
@include('customer.layouts.nav')
<main class="py-4">
    @yield('content')
</main>
<!--{{--footer--}}-->
{{--@include('customer.layouts.footer')--}}
<footer class="container-fluid p-0 pr-0" style="">

    <div class="copy pt-4 pb-4">
        <p><a href="" target="">Copyright &copy; <?php echo date("Y")?> Solacer</a>  &nbsp;  |  &nbsp; Design by <a href="https://www.facebook.com/thanbirtamim" target="_blank">Thanbir</a> &nbsp; | &nbsp;  All rights reserved</p>
    </div>
</footer>

{{--<a href="#" class="open-button" onclick="openForm()"><img style="background: springgreen; border: 2px solid black; border-radius: 15px" src="https://img.icons8.com/windows/452/technical-support-wearing-glasses.png" width="60" height="60" id="fixedbutton"></a>--}}
{{--<div class="chat-popup" id="myForm">--}}
    {{--<form action="/action_page.php" class="form-container">--}}
        {{--<h1>Chat</h1>--}}

        {{--<label for="msg"><b>Message</b></label>--}}
        {{--<textarea placeholder="Type message.." name="msg" required></textarea>--}}

        {{--<button type="submit" class="btn">Send</button>--}}
        {{--<button type="button" class="btn cancel" onclick="closeForm()">Close</button>--}}
    {{--</form>--}}
{{--</div>--}}

{{--<script>--}}
    {{--function openForm() {--}}
        {{--document.getElementById("myForm").style.display = "block";--}}
    {{--}--}}

    {{--function closeForm() {--}}
        {{--document.getElementById("myForm").style.display = "none";--}}
    {{--}--}}
{{--</script>--}}

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6076b1b3f7ce1827093a42b2/1f37qc9jf';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>--}}
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
