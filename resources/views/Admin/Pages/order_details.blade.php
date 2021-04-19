@extends('layouts.app')

@section('content')
    @include('Admin.layouts.admin_sidebar')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="">
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
                </div>
            </div>

        </div>
        <br>



        <div class="container">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Details</h4></center>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Transaction ID: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->session_id}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Name: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->name}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Phone: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->phone}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> User Comments: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->comment}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Address: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->address}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Products' Details: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->product_id_name_quantity}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Net Price: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->net_price}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Sub Total: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->subtotal_price}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> VAT: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->vat_price}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Shipping Cost: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->shipping_price}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Discount: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6>TK {{$item->discount}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Payment Status: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->payment_status}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Delivery Status: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->delivery_status}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> SMS Response: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->response}} </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Updated By: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->added_by}} (at::::: {{$item->updated_at->format('F j, Y, g:i a')}}) </h6>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid black; padding: 8px">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6> Time: </h6>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <h6> {{$item->created_at->format('F j, Y, g:i a')}} </h6>
                </div>
            </div>
        </div><br>
    </div>
@endsection
