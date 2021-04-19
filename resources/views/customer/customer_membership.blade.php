@extends('customer.layouts.app')
@section('content')
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xm-2"></div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xm-8" style="font-family: 'Britannic Bold'; color: black; font-size: 19px">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        {{--<img src="/storage/photogallery/{{ Session::get('image') }}">--}}
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        {{--<img src="/storage/photogallery/{{ Session::get('image') }}">--}}
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <marquee>Membership is 100% free & Members will get 5% discount for every order!!!!</marquee>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-2 col-xm-2"></div>
            </div>
            <div class="row" style="padding-bottom: 200px">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xm-8" style="background-image: linear-gradient(white,transparent); padding: 20px; border: 20px solid black; border-radius: 15px; color: black">
                    <center><h3>Membership/Registration Form</h3></center>
                    <form class="form-group" action="/customer/membership" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input class="form-control form-control-sm" type="text" name="customer_name" required maxlength="20" placeholder="Your Name.."><br>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-phone icon"></i>
                            <input class="form-control form-control-sm" type="text" maxlength="11" required name="customer_phone" placeholder="Your Phone.."><br>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-calendar-times-o icon"></i>
                            <input class="form-control form-control-sm" type="number" name="age" max="100" min="1" placeholder="Your Age.."><br>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-male icon"></i>
                            <input type="radio" id="male" name="gender" value="1">
                            <label for="male">Male</label>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-female icon"></i>
                            <input type="radio" id="female" name="gender" value="0">
                            <label for="female">Female</label><br>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-facebook icon"></i>
                            <input class="form-control form-control-sm" type="text" maxlength="60" name="social_media_link" placeholder="Your Fb Id link..(if any)"><br>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-address-card icon"></i>
                            <textarea class="form-control form-control-sm"  name="address" rows="3" placeholder="Your Address.."></textarea><br>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary btn-sm" onclick="">
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
            </div>
        </div>
    </div>
@endsection
