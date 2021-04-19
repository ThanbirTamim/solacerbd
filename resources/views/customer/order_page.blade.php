@extends('customer.layouts.app')
@section('content')
    <?php
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = rand().date('Y-m-d H:i:s');
    }
    ?>
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container">
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
            <div class="row" style="padding-bottom: 500px" >
                <div id="responsecontainer" class="col-lg-6 col-md-6 col-sm-6 col-xm-6" style="padding: 1rem; color: black; border-radius: 15px; background-image: linear-gradient(white,transparent); margin-right: 5px">
                    {{--<table class="table">--}}
                        {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th scope="col">Item</th>--}}
                                {{--<th scope="col">Name</th>--}}
                                {{--<th scope="col">Quantity</th>--}}
                                {{--<th scope="col">Price</th>--}}
                                {{--<th scope="col">Your Comments</th>--}}
                                {{--<th scope="col">Action</th>--}}
                            {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td><img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" width="50px" height="70px"></td>--}}
                                {{--<td>Otto</td>--}}
                                {{--<td><input size="50" type="number" min="1" max="100" value="2"/></td>--}}
                                {{--<td>@mdo</td>--}}
                                {{--<td><textarea placeholder="Please write specific (Size, color or others)" rows="2"></textarea></td>--}}
                                {{--<td><input type="submit" class="btn btn-danger btn-sm" value="Remove"></td>--}}
                            {{--</tr>--}}

                        {{--</tbody>--}}
                    {{--</table>--}}

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xm-4" style="background-image: linear-gradient(white,transparent); padding: 10px; border: 3px solid black; border-radius: 15px; color: black">

                    <center><h3>Order Summery</h3></center>
                    <table class="table" style="text-align: center;font-family: 'Britannic Bold';font-size: 14px">
                        <tbody>
                        <tr style="border-top: 2px solid black">
                            <td>Sub-Total:</td>
                            <td id="sub_total"></td>
                        </tr>
                        <tr>
                            <td>Shipping:</td>
                            <td id="shippng"></td>
                        </tr>
                        <tr style="border-bottom: 2px solid black">
                            <td>VAT:</td>
                            <td id="vat"></td>
                        </tr>
                        <tr style="border-bottom: 2px solid black">
                            <td>Discount (5%):</td>
                            <td id="discount"></td>
                        </tr>
                        <tr>
                            <td>TOTAL: </td>
                            <td id="netprice"></td>
                        </tr>
                        </tbody>
                    </table>
                    {{--<form class="form-inline" action="#" method="post" enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        {{--<input class="form-control form-control-sm" type="text" name="coupons" placeholder="Available Coupons"><br>--}}
                        {{--<input type="submit" value="Apply" class="btn btn-dark btn-sm" onclick="">--}}
                    {{--</form>--}}
                    <br>
                    <form class="form-group" action="/checkout/cart/order" method="post" enctype="multipart/form-data">
                        @csrf
                        <input style="margin-top: -20px" class="form-control form-control-sm" type="text" name="customer_name" placeholder="Your Name.." required><br>
                        <input class="form-control form-control-sm" type="text" name="customer_phone" placeholder="Your Phone.." required maxlength="11" minlength="11"><br>
                        <textarea class="form-control form-control-sm" name="comment" rows="3" placeholder="Please write your comment for(Size, Color or etc)" required></textarea><br>
                        <textarea class="form-control form-control-sm" name="address" rows="3" placeholder="Address" required></textarea><br>
                        <p>Payment with BKASH or Rocket or Nagad (017xxxxxxxxxx)</p>
                        <input type="submit" value="Place Order" class="btn btn-primary btn-sm" onclick="">
                        <input hidden class="form-control form-control-sm" type="text" id="product_id_name_quantity" name="product_id_name_quantity" value="" placeholder="Your Name.."><br>
                        <input hidden class="form-control form-control-sm" type="text" id="shipping_price" name="shipping_price" value="" placeholder="Your Name.."><br>
                        <input hidden class="form-control form-control-sm" type="text" id="net_price" name="net_price" value=""><br>
                        <input hidden class="form-control form-control-sm" type="text" id="vat_price" name="vat_price" value=""><br>
                        <input hidden class="form-control form-control-sm" type="text" id="subtotal_price" name="subtotal_price" value=""><br>
                        <input hidden class="form-control form-control-sm" type="text" id="session_id" name="session_id" value="{{ $_SESSION['id'] }}" placeholder="Your Name.."><br>
                        <input hidden class="form-control form-control-sm" type="text" id="discount_price" name="discount" value="" placeholder="Your Name.."><br>
                        {{--<input hidden class="form-control form-control-sm" type="text" name="session_id" value="{{ $_SESSION['id'] }}" placeholder="Your Name.."><br>--}}
                    </form>
                    <button style="margin-top: -200px" id="clearCart" class="btn btn-outline-danger btn-sm" onclick="clearCart(this)">Clear Cart</button>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script>


        $(document).ready(function(){
            var a = '<?php echo $_SESSION['id']; ?>';
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('session_id', a);
            $.ajax({
                async: false,
                crossDomain: true,
                url: "/checkout/cart/all",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: 'multipart/form-data',
                data: form
            }).done(function (response) {
                // console.log(response);
                var data = response.split("%");
                $("#responsecontainer").html(data[0]);
                document.getElementById('sub_total').innerHTML = data[1];
                document.getElementById('shippng').innerHTML = data[2];
                document.getElementById('vat').innerHTML = data[3];
                document.getElementById('netprice').innerHTML = data[4];
                document.getElementById('net_price').value = data[4];
                document.getElementById('product_id_name_quantity').value = data[5];
                document.getElementById('vat_price').value = data[3];
                document.getElementById('subtotal_price').value = data[1];
                document.getElementById('shipping_price').value = data[2];
                document.getElementById('discount').value = data[6];
                document.getElementById('discount_price').value = data[6];

            });
        });

        function removeID(e) {
            var retVal = confirm("Do you really want to remove from cart?");
            if (retVal == true) {
                var a = '<?php echo $_SESSION['id']; ?>';
                var product_id = document.getElementById('remove').value;
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('session_id', a);
                form.append('product_id', product_id);
                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/checkout/cart/product-remove",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    // console.log(response);
                    if(response == 'success'){
                        window.open('/checkout/cart', "_self")
                    }else{
                        alert('Failed to delete item from this cart');
                    }

                    // $("#responsecontainer").html(response);
                });
            } else {
                return false;
            }
        }

        function sizeChange(e) {
            alert("You can't change size now. To change remove it and go to previous page with select size!!! ");
            window.open('/checkout/cart', "_self")
        }

        function clearCart(e){
            var retVal = confirm("Do you really want to clear full cart?");
            if (retVal == true) {
                var a = '<?php echo $_SESSION['id']; ?>';
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('session_id', a);
                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/checkout/cart/remove",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    // console.log(response);
                    if(response == 'success'){
                        alert('Removed!!!');
                        window.open('/checkout/cart', "_self")
                    }else{
                        alert('Failed to delete item from this cart');
                    }

                    // $("#responsecontainer").html(response);
                });
            } else {
                return false;
            }
        }
    </script>

@endsection
