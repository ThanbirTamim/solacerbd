@extends('customer.layouts.app')
@section('content')
    <?php
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = rand().date('Y-m-d H:i:s');
    }
    ?>
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container">
            <div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
                    <b><h4 style="font-family: 'Footlight MT Light'; padding-top: 5px">Details</h4></b>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xm-7">
                    <div class="container">
                        <p hidden>{{ $i = 1 }}</p>
                        <center>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file1}}">
                            </div>
                            <p hidden>{{ $i++ }}</p>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file2}}">
                            </div>
                            <p hidden>{{ $i++ }}</p>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file3}}">
                            </div>
                            <p hidden>{{ $i++ }}</p>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file4}}">
                            </div>
                            <p hidden>{{ $i++ }}</p>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file5}}">
                            </div>
                            <p hidden>{{ $i++ }}</p>
                            <div class="mySlides" style="border: 2px solid black;">
                                <div class="numbertext" style="color: black">{{ $i }} / 6</div>
                                <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file6}}">
                            </div>
                        </center>
                        {{--@foreach($value as $item)--}}

                        {{--@endforeach--}}
                        {{--<div class="mySlides">--}}
                            {{--<div class="numbertext">2 / 6</div>--}}
                            {{--<img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" style="width:100%">--}}
                        {{--</div>--}}

                        {{--<div class="mySlides">--}}
                            {{--<div class="numbertext">3 / 6</div>--}}
                            {{--<img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" style="width:100%">--}}
                        {{--</div>--}}

                        {{--<div class="mySlides">--}}
                            {{--<div class="numbertext">4 / 6</div>--}}
                            {{--<img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" style="width:100%">--}}
                        {{--</div>--}}

                        {{--<div class="mySlides">--}}
                            {{--<div class="numbertext">5 / 6</div>--}}
                            {{--<img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" style="width:100%">--}}
                        {{--</div>--}}

                        {{--<div class="mySlides">--}}
                            {{--<div class="numbertext">6 / 6</div>--}}
                            {{--<img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg" style="width:100%">--}}
                        {{--</div>--}}

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>

                        <div class="caption-container">
                            <p id="caption"></p>
                        </div>

                        <div class="row">
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file1}}" style="width:100%" onclick="currentSlide(1)" alt="{{$item->name}}">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file2}}" style="width:100%" onclick="currentSlide(2)" alt="{{$item->name}}">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file3}}" style="width:100%" onclick="currentSlide(3)" alt="{{$item->name}}">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file4}}" style="width:100%" onclick="currentSlide(4)" alt="{{$item->name}}">
                        </div>
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file5}}" style="width:100%" onclick="currentSlide(5)" alt="{{$item->name}}">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="{{'/storage/AllProducts/'.$item->file6}}" style="width:100%" onclick="currentSlide(6)" alt="{{$item->name}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xm-5" style="color: black;">
                    <div style="border-radius: 15px">
                        <div style="background-image: linear-gradient(#E6E6FA,white); padding: 25px; border: 5px solid black; border-radius: 10px">
                            <input hidden style="font-family: 'Adobe Arabic'" id="product_id" value="{{ $item->id }}" />
                            <h1 style="font-family: 'Adobe Arabic'"><b style="text-decoration: unset">Name:</b> {{ $item->name }}</h1>
                            <h3 style="font-family: 'Adobe Arabic'; border-top: 1px solid black;margin-top: 5px; padding-top: 5px"><b style="text-decoration: underline;">Price:</b> {{ $item->price }} TK</h3>
                            <h3 style="font-family: 'Adobe Arabic'; border-top: 1px solid black;margin-top: 5px; padding-top: 5px"> <b style="text-decoration: underline;">Quantity:</b> <input id="quantity" size="50" type="number" value="1" min="1" max="999" /></h3>
                            <h3 style="font-family: 'Adobe Arabic'; border-top: 1px solid black;margin-top: 5px; padding-top: 5px"> <b style="text-decoration: underline;">Your Size:</b>
                                <select name="size_type" id="size_type" required>
                                    <option value="xs">XS</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                    <option value="xxxl">XXXL</option>
                                    <option value="4xl">4XL</option>
                                </select>
                            </h3>
                            <h3 style="font-family: 'Adobe Arabic'; border-top: 1px solid black;margin-top: 5px; padding-top: 5px"><b style="text-decoration: underline;">Product Code:</b> {{ $item->name }}-{{ $item->id }}</h3>
                            <h3 style="font-family: 'Adobe Arabic'; border-top: 1px solid black;margin-top: 5px; padding-top: 5px">
                                <b style="padding: 3px">Description:</b> <br>
                                <b style="text-decoration: underline;">Available Size:</b> {{ ucfirst($item->size_type) }}<br>
                                <b style="text-decoration: underline;">Gender (For):</b> {{ ucfirst($item->gender_type) }}<br>
                                <b style="text-decoration: underline;">Fabric:</b> {{ ucfirst($item->fabric) }}<br>
                                <b style="text-decoration: underline;">Details:</b> {{ ucfirst($item->description) }}
                            </h3>
                            <div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-6" style="padding: 5px">
                                        <input type="submit" value="Add To Bag" name="" class="form-control btn btn-info btn-sm" onclick="addBag(this)" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-6" style="padding: 5px">
                                        <a href="/all-products"><input type="submit" value="Continue Shopping" name="" class="form-control btn btn-primary btn-sm" /></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xm-3">

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-6" style="padding: 5px">
                                        <a href="/checkout/cart"><input type="submit" value="Order" name="" class="form-control btn btn-success btn-sm" /></a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xm-3">

                                    </div>
                                </div>
                            </div>



                            {{--<button type="submit"--}}
                            {{--title="ADD TO BAG"--}}
                            {{--class="action primary tocart"--}}
                            {{--id="product-addtocart-button"--}}
                            {{--data-name="Green Appliqued and Embroidered Muslin Saree"--}}
                            {{--data-sku="0550000119387"--}}
                            {{--data-price="12000"--}}
                            {{--data-image="https://www.aarong.com/media/catalog/product/cache/935ccca3cb55b2c559481b9a13439511/0/5/0550000119387.jpg"--}}
                            {{--data-currency="Tk "--}}
                            {{--data-carturl="https://www.aarong.com/checkout/cart/"--}}
                            {{--data-stockqty="2"--}}
                            {{-->--}}
                            {{--<span>ADD TO BAG</span>--}}
                            {{--</button>--}}

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }

        function addBag(e) {
            var a = '<?php echo $_SESSION['id']; ?>';
            // console.log(document.getElementById("product_id").value);
            var product_id = document.getElementById("product_id").value;
            var quantity = document.getElementById("quantity").value;
            var size_type = document.getElementById("size_type").value;

            if(quantity <= 0 || quantity >= 1000){
                alert('Please provide a quantity!!!')
            }else{
                var form = new FormData();
                form.append('_token', '{{ csrf_token() }}');
                form.append('session_id', a);
                form.append('product_id', product_id);
                form.append('quantity', quantity);
                form.append('size_type', size_type);
                $.ajax({
                    async: false,
                    crossDomain: true,
                    url: "/customer/temp_bag",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    data: form
                }).done(function (response) {
                    if(response == 'success'){
                        alert('Added to bag. You can continue shopping or can place order!!!')
                    }else{
                        alert('Failed to add')
                    }
                    // console.log(response);
                });
            }
        }
    </script>
@endsection
