@extends('layouts.app')
@section('content')
    @include('customer.layouts.customer_sidebar')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-7">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Product Info</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Delivery</th>
                            <th scope="col">Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="">
                                <td>{{$item->session_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->product_id_name_quantity}}</td>
                                <td>{{$item->net_price}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->delivery_status}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $value->links() }}
                </div>
            </div><br>
        </div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <center><i><h4 style="color:#ff0000;"><br>**{{$error}}** <br></h4></i></center>
            @endforeach
        @endif

    </div>
@endsection
