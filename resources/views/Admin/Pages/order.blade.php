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



        <div class="container-fluid">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Order Information</h4></center>
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="" style="text-align: center">
                            {{--<th>Tran. ID</th>--}}
                            <th>Name</th>
                            <th>Phone</th>
                            {{--<th>Address</th>--}}
                            {{--<th>User Comments</th>--}}
                            <th>Product Info</th>
                            <th>Net Price</th>
                            <th>Payment</th>
                            <th>Delivery</th>
                            {{--<th>Response</th>--}}
                            <th>Time</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="text-align: center">
                                {{--<td>--}}
                                    {{--{{$item->session_id}}--}}
                                {{--</td>--}}
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->phone}}
                                </td>
                                {{--<td>--}}
                                    {{--{{$item->address}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{$item->comment}}--}}
                                {{--</td>--}}
                                <td>
                                    {{$item->product_id_name_quantity}}
                                </td>
                                <td>
                                    {{$item->net_price}}
                                </td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->delivery_status}}</td>
                                {{--<td>{{$item->response}}</td>--}}
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td>
                                    <form style="margin-top: 2px" class="form-inline" action="/admin/customer_order/message" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input name="id" value="{{$item->id}}" hidden required>
                                        <input name="name" value="{{$item->name}}" hidden required>
                                        <input name="number" value="{{$item->phone}}" hidden required>
                                        <textarea name="answer" rows="2" cols="5" placeholder="write sms" required></textarea>
                                        <button type="submit" class="btn btn-primary btn-sm">Send</button>
                                    </form>
                                </td>
                                <td>
                                    {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</button>--}}
                                    <button onclick="updateOrderInfoPassModal(this)" class="btn btn-primary btn-sm"
                                            data-id="{{$item->id}}"
                                            data-payment_status="{{$item->payment_status}}"
                                            data-delivery_status="{{$item->delivery_status}}"
                                        {{--data-toggle="modal"--}}
                                        {{--data-target="#exampleModal"--}}
                                        {{--data-whatever="@mdo"--}}
                                    >
                                        Update
                                    </button>
                                    <a href="/admin/customer_order/{{ $item->id }}" ><button class="btn btn-sm btn-dark">View Detail</button></a>
                                </td>
                                {{--<form action="/admin/all_products/update" method="post" enctype="multipart/form-data">--}}
                                    {{--@csrf--}}

                                {{--</form>--}}

                            </tr>
                        @endforeach
                        <tr>
                        </tbody>
                    </table>
                    {{$value->links()}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  class="form-group" action="/admin/customer_order " id="fupForm" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input readonly hidden class="" type="text" :maxlength="300" name="id" id="id_m" required value="">
                                        <label for="payment_status">Choose a payment status:</label>
                                        <select name="payment_status" id="payment_status_m" required>
                                            <option value="0">Select one..</option>
                                            <option value="undone">Undone</option>
                                            <option value="done">Done</option>
                                        </select>
                                        <label for="delivery_status">Choose a delivery status:</label>
                                        <select name="delivery_status" id="delivery_status_m" required>
                                            <option value="0">Select one..</option>
                                            <option value="undone">Undone</option>
                                            <option value="done">Done</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm" id="butsave_m">Update</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><br>
    </div>

    <script>
        function updateOrderInfoPassModal(e) {
            var id = (e.getAttribute("data-id"));
            var payment_status = (e.getAttribute("data-payment_status"));
            var delivery_status = (e.getAttribute("data-delivery_status"));
            // console.log(id, name,price,size_type,gender_type, age_type,febric_type, product_type);
            document.getElementById("id_m").value = id;
            document.getElementById("payment_status_m").value = payment_status;
            document.getElementById("delivery_status_m").value = delivery_status;
            // document.getElementById("price_m").value = e.data-price;
            $("#exampleModal").modal()
        }
    </script>
@endsection
