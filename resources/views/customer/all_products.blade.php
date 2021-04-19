@extends('customer.layouts.app')
@section('content')
    <?php
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = rand().date('Y-m-d H:i:s');
    }
    ?>
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container" style="background: #E6E6FA; padding: 10px; border-radius: 10px">
            <div class="row" >
                {{--<div class="col-lg-1 col-md-1 col-sm-1 col-xm-1">--}}
                    {{--<b><h4 style="font-family: 'Footlight MT Light'; padding-top: 5px">Advance Search</h4></b>--}}
                {{--</div>--}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12" style="font-family: 'Footlight MT Light'">
                    <form class="form-inline" id="searchForm" onsubmit="return false">
                        @csrf
                        <input style="background: transparent; border: 3px solid black; margin-right: 3px" class="form-control" type="text" name="keyword" id="keyword" placeholder="Keyword..">
                        <select class="form-control" style="background: transparent; border: 3px solid black; margin-right: 3px" name="price" id="price">
                            {{--1=low, 2=medium, 3=medium-high, 4=high--}}
                            <option value="0"> Select Price </option>
                            <option value="1"> 1 - 750Tk </option>
                            <option value="2"> 751 - 1500Tk </option>
                            <option value="3"> 1501 - 2500Tk </option>
                            <option value="4"> 2501 - 5000TK</option>
                            <option value="5"> 5001 - 10000TK</option>
                            <option value="6"> 10000TK +</option>
                        </select>

                        <select class="form-control" name="age" id="age" style=" background: transparent; border: 3px solid black; margin-right: 3px">
                            <option value="0">Select Age..</option>
                            <option value="all">All</option>
                            <option value="child">Child (0-12 years)</option>
                            <option value="adolescence">Adolescence (13-18 years)</option>
                            <option value="adult">Adult (19-59 years)</option>
                            <option value="senior adult">Senior Adult (60 years and above)</option>
                        </select>

                        <select class="form-control" name="product" id="product" style="background: transparent; border: 3px solid black; margin-right: 3px">
                            <option value="0">Select Product type</option>
                            <option value="shirts">Shirts</option>
                            <option value="shrugs">Shrugs</option>
                            <option value="tops">Tops</option>
                            <option value="pant">Pant</option>
                            <option value="knit trouser">Knit Trouser</option>
                            <option value="crop tops">Crop Tops</option>
                            <option value="tee shirt">Tee Shirt</option>
                            <option value="fatua">Fatua</option>
                            <option value="panjabi">Panjabi</option>
                            <option value="formal shirt">Formal Shirt</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="dresses">Dresses</option>
                            <option value="jumpsuit">Jumpsuit</option>
                            <option value="sweater">Sweater</option>
                            <option value="jacket">Jacket</option>
                            <option value="wrap tops">Wrap tops</option>
                        </select>
                        {{--<input style="margin-left: 5px" type="image" src="{{asset('img/Search.png')}}" alt="Submit" width="37" height="37" id="search" name="search" onclick="searchProduct()">--}}
                        <input onclick="btnSearchKeyword(this)" value="" style="margin-left: 5px" type="image" src="{{asset('img/Search.png')}}" alt="" width="37" height="37" id="search" name="search">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row" id="responsecontainer" style="margin-top: 10px; margin-bottom: 30rem">
                <div class="bx bx-1 col-sm-4">

                </div>
                {{--@foreach($allproduct as $item)--}}
                    {{--<div class="bx bx-1 col-sm-3">--}}
                        {{--<div class="card"> <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file1}}">--}}
                            {{--<div class="card-img-overlay"> --}}{{--<a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">{{$item->name}}</h5>--}}
                                    {{--<a style="text-align: left; color: dodgerblue; font-weight: bold; font-size: 0.7rem" class="card-text" href="/all-products/{{$item->id}}" >See Details</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
            {{--<center><p>{{ $allproduct->links() }}</p></center>--}}
        </div>
    </div>
    {{--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>--}}
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script>


        $(document).ready(function(){
            //when we load this page;
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('data', 'all');
            $.ajax({
                async: false,
                crossDomain: true,
                url: "/all-products/search",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: 'multipart/form-data',
                data: form
            }).done(function (response) {
                $("#responsecontainer").html(response);
            });


            $('#price').on('change', function() {
                var price = document.getElementById("price").value;
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('data', "price");
                form.append('value', price);

                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/all-products/search",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    document.getElementById('age').value="0";
                    document.getElementById('product').value="0";
                    $("#responsecontainer").html(response);
                });
            });
            $('#age').on('change', function() {
                var age = document.getElementById("age").value;
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('data', "age");
                form.append('value', age);

                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/all-products/search",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    document.getElementById('price').value="0";
                    document.getElementById('product').value="0";
                    $("#responsecontainer").html(response);
                });
            });
            $('#product').on('change', function() {
                var product = document.getElementById("product").value;
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('data', "product");
                form.append('value', product);

                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/all-products/search",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    document.getElementById('age').value="0";
                    document.getElementById('price').value="0";
                    $("#responsecontainer").html(response);
                });
            });

            $('#keyword').on('change', function() {
                var keyword = document.getElementById("keyword").value;
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('data', "keyword");
                form.append('value', keyword);

                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/all-products/search",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    document.getElementById('age').value="0";
                    document.getElementById('price').value="0";
                    document.getElementById('product').value="0";
                    $("#responsecontainer").html(response);
                });
            });

        });

        function btnSearchKeyword(e){
            var keyword = document.getElementById("keyword").value;
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('data', "keyword");
            form.append('value', keyword);

            $.ajax({
                async: false,
                crossDomain: true,
                url: "/all-products/search",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: 'multipart/form-data',
                data: form
            }).done(function (response) {
                document.getElementById('age').value="0";
                document.getElementById('price').value="0";
                document.getElementById('product').value="0";
                $("#responsecontainer").html(response);
            });
        }






    </script>
@endsection
