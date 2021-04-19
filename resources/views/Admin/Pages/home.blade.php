@extends('layouts.app')
@section('content')
    @include('Admin.layouts.admin_sidebar')
    <div class="main">
        <div class="container">
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Total Product: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $totalProduct }} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Total Members: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $totalMembers }} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Total Order: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $totalOrder }} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Total Undone Payment: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $totalUndonePayment }} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Payment Done (Delivery Undone): </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $totalUndoneDelivary }} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Customers Question's Answer (Undone): </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{ $contactundone }} </h6>
                </div>
            </div>
        </div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <center><i><h4 style="color:#ff0000;"><br>**{{$error}}** <br></h4></i></center>
            @endforeach
        @endif

    </div>
    </div>
@endsection
