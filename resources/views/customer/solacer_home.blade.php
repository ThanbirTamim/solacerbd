@extends('customer.layouts.app')
@section('content')
    <?php
        if(!isset($_SESSION['id'])){
            $_SESSION['id'] = rand().date('Y-m-d H:i:s');
        }
    ?>
    <div class="container-fluid fh5co-home-banner">
        <div class="card">
            @if($frontView->filename != null && file_exists(storage_path('app/public/FrontView/'.$frontView->filename)))
                {{--<img class="card-img" src="img/banner-img.jpg" alt="">--}}
                <img class="card-img" src="{{'/storage/FrontView/'.$frontView->filename}}" class="img-responsive">
            @else
                <img class="card-img" src="img/banner-img.jpg" alt="">
            @endif


            {{--<video autoplay muted loop id="myVideo">--}}
            {{--<source src="{{asset('video/video1.avi')}}" type="video/mp4">--}}
            {{--</video>--}}
            <div class="card-img-overlay">
                <div class="center-text">
                    <h2 class="card-title">
                        @if($frontView->title != null)
                            {{$frontView->title}}
                        @else
                            Welcome to SolacerBD!!!
                        @endif

                        {{--@foreach($frontView as $item) {{$item->title}} @endforeach--}}
                    </h2>
                    <a href="/customer/membership" class="btn">
                        <svg width="201" height="51" viewBox="0 0 201 51">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke-width: 1px;
                                        stroke: url(#linear-gradient);
                                    }
                                </style>
                                <linearGradient id="linear-gradient" x1="140.508" y1="50.5" x2="60.492" y2="0.5" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#e90e65"/>
                                    <stop offset="1" stop-color="#fff"/>
                                </linearGradient>
                            </defs>
                            <rect id="Rounded_Rectangle_1" data-name="Rounded Rectangle 1" class="cls-1" x="0.5" y="0.5" width="200" height="50" rx="25" ry="25"/>
                        </svg>
                        Membership</a> </div>
            </div>
        </div>
    </div>
    {{--twopic--}}
    <div class="container-fluid fh5co-two-img">
        <div class="row">
            <div class="col-sm-6 pr-0 pl-0">
                <div class="card">
                    @if($aboutSolacer->file1 != null && file_exists(storage_path('app/public/AboutSolacer/'.$aboutSolacer->file1)))
                        {{--<img class="card-img" src="img/banner-img.jpg" alt="">--}}
                        <img  class="card-img" src="{{'/storage/AboutSolacer/'.$aboutSolacer->file1}}" class="img-responsive">
                    @else
                        <img class="card-img" src="img/girl1.jpg" alt="">
                    @endif
                    <div class="card-img-overlay"> </div>
                </div>
            </div>
            <div class="col-sm-6 pr-0 pl-0">
                <div class="card">
                    @if($aboutSolacer->file2 != null && file_exists(storage_path('app/public/AboutSolacer/'.$aboutSolacer->file2)))
                        {{--<img class="card-img" src="img/banner-img.jpg" alt="">--}}
                        <img  class="card-img" src="{{'/storage/AboutSolacer/'.$aboutSolacer->file2}}" class="img-responsive">
                    @else
                        <img class="card-img" src="img/girl2.jpg" alt="">
                    @endif
                    <div class="card-img-overlay"> </div>
                </div>
            </div>
        </div>
    </div>
    {{--new products--}}
    <div class="container-fluid fh5co-recent-work">
        <div class="container contact-pop">
            <div class="row">
                <div class="col-md-6  pr-0">
                    <div class="card"> <img class="card-img w-100" src="img/girl3.jpg" alt="">
                        <div class="card-img-overlay"> </div>
                    </div>
                </div>
                <div class="col-md-6 pl-0" id="about">
                    <div class="content">
                        @if($aboutSolacer->heading != null)
                            <h3>{{$aboutSolacer->heading}}</h3>
                        @else
                            <h3>About SolacerBD</h3>
                        @endif

                        <hr />
                            @if($aboutSolacer->description != null)
                                <p>{{$aboutSolacer->description}}</p>
                            @else
                                <p>
                                    A garment is a piece of clothing. The area of Dhaka City where clothes are manufactured is known as the Garment District. Derived from the French word for "equipment," garment is a somewhat generic term you can use when the specific kind of clothing you're describing is not the point.
                                </p>
                            @endif

                        <a href="/customer/contact" class="btn">CONTACT</a> </div>
                </div>
            </div>
        </div>
        <div class="container recent" id="activity">
            <div class="row">
                <h2>New Products</h2>
                <div class="owl-carousel owl-carousel2 owl-theme">
                    @foreach($AllProducts as $item)
                    <div>
                        <div class="card"><img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file1}}">
                            {{--<img class="card-img" src="img/recent-img1.jpg" alt="">--}}
                            <div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>
                                <div class="bottom-text">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <a style="text-align: left; color: dodgerblue; font-weight: bold; font-size: 0.7rem" class="card-text" href="/all-products/{{ $item->id }}">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{--<div>--}}
                        {{--<div class="card"> <img class="card-img" src="img/recent-img2.jpg" alt="">--}}
                            {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Product photography</h5>--}}
                                    {{--<p class="card-text">Digital, Photography</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div class="card"> <img class="card-img" src="img/recent-img3.jpg" alt="">--}}
                            {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Tour and potrait</h5>--}}
                                    {{--<p class="card-text">Digital, Photography</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div class="card"> <img class="card-img" src="img/recent-img4.jpg" alt="">--}}
                            {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Classical photography</h5>--}}
                                    {{--<p class="card-text">Digital, Photography</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    {{--all products--}}
    <div class="container-fluid recent fh5co-portfolio" id="portfolio">
        <div class="container">
            <h2>Products</h2>
            <div class="row">
                @foreach($AllProducts2 as $item)
                    <div class="bx bx-1 col-sm-3">
                        <div class="card"> <img class="card-img" style="width: 13rem; height: 17rem" src="{{'/storage/AllProducts/'.$item->file1}}">
                            <div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>
                                <div class="bottom-text">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <a style="text-align: left; color: dodgerblue; font-weight: bold; font-size: 0.7rem" class="card-text" href="/all-products/{{ $item->id }}">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--<div class="bx bx-2">--}}
                    {{--<div class="card"> <img class="card-img" src="img/portfolio-img2.png" alt="">--}}
                        {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                            {{--<div class="bottom-text">--}}
                                {{--<h5 class="card-title">Vacation special photography</h5>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="bx bx-3">--}}
                    {{--<div class="card"> <img class="card-img" src="img/portfolio-img3.png" alt="">--}}
                        {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                            {{--<div class="bottom-text">--}}
                                {{--<h5 class="card-title">Product photography</h5>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="bx bx-4">--}}
                    {{--<div class="card"> <img class="card-img" src="img/portfolio-img4.png" alt="">--}}
                        {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                            {{--<div class="bottom-text">--}}
                                {{--<h5 class="card-title">Historical place shots</h5>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="bx bx-middle" style="padding: 0;">--}}
                    {{--<div class="bx bx-5">--}}
                        {{--<div class="card"> <img class="card-img" src="img/portfolio-img5.png" alt="">--}}
                            {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Lorem ipsum dolor</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="bx bx-6">--}}
                        {{--<div class="card"> <img class="card-img" src="img/portfolio-img6.png" alt="">--}}
                            {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Lorem ipsum dolor</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div class="bx bx-7">--}}
                            {{--<div class="card"> <img class="card-img" src="img/portfolio-img7.png" alt="">--}}
                                {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                    {{--<div class="bottom-text">--}}
                                        {{--<h5 class="card-title">Portraits</h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="bx bx-8">--}}
                            {{--<div class="card"> <img class="card-img" src="img/portfolio-img8.png" alt="">--}}
                                {{--<div class="card-img-overlay"> <a href="#"><img src="img/heart.png" class="heart" alt="heart icon"></a>--}}
                                    {{--<div class="bottom-text">--}}
                                        {{--<h5 class="card-title">Wedding photography</h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="row" style="margin-top: 1rem;">
                <div class="col-sm-5" style="text-align: center;">

                </div>
                <div class="col-sm-2" style="text-align: center;">
                    <a href="/all-products">
                        <button class="btn btn-sm btn-primary">
                            See More
                        </button>
                    </a>
                </div>
                <div class="col-sm-5" style="text-align: center;">

                </div>
            </div>
        </div>
    </div>
    {{--best selling--}}
    <div class="container-fluid fh5co-recent-work activity">
        <div class="container recent">
            <div class="row">
                <h2>Best Selling Products </h2>

                <div class="owl-carousel owl-carousel3 owl-theme">
                    @foreach($BestSelling as $item)
                    <div>
                        <div class="card"> <img class="card-img" style="width: 22rem; height: 24rem" src="{{'/storage/AllProducts/'.$item->file2}}">
                            <div class="card-img-overlay">
                                <div class="bottom-text">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <a style="text-align: left; color: dodgerblue; font-weight: bold; font-size: 0.7rem" class="card-text" href="/all-products/{{ $item->id }}">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{--<div>--}}
                        {{--<div class="card"> <img class="card-img" src="img/activity-img2.png"  alt="">--}}
                            {{--<div class="card-img-overlay">--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Sed ut perspiciatis unde &nbsp; iste natus error sit volup</h5>--}}
                                    {{--<a href="#">Read more <img src="img/double-right.svg" alt=""></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div class="card"> <img class="card-img" src="img/activity-img3.png" alt="">--}}
                            {{--<div class="card-img-overlay">--}}
                                {{--<div class="bottom-text">--}}
                                    {{--<h5 class="card-title">Sed ut perspiciatis unde &nbsp; iste natus error sit volup</h5>--}}
                                    {{--<a href="#">Read more <img src="img/double-right.svg" alt=""></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    {{--people say about--}}

    <div class="container-fluid fh5co-recent-work activity" style="background: linear-gradient(papayawhip, white)">
        <div class="container recent">
            <div class="row">
                <h2>Our team </h2>

                <div class="owl-carousel owl-carousel3 owl-theme">
                    @foreach($Team as $item)
                        <div>
                            <div class="card"> <img class="card-img" style="width: 23rem; height: 22rem" src="{{'/storage/Team/'.$item->file}}">
                                <div class="card-img-overlay">
                                    <div class="bottom-text">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text" href="">{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{--<div class="container-fluid fh5co-about-me" id="testimonial">--}}
        {{--<div id="my-carousel" class="carousel slide" data-ride="carousel">--}}
            {{--<div class="carousel-inner">--}}
                {{--<div class="card"> <img class="card-img d-block w-100" src="img/about-me-img.jpg" alt="">--}}
                    {{--<div class="card-img-overlay">--}}
                        {{--<h2>Our Team</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@foreach($Team as $item)--}}
                {{--<div class="carousel-item active">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>{{$item->description}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--<div class="carousel-item ">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="carousel-item">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="carousel-item">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="carousel-item">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="carousel-item">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="carousel-item">--}}
                    {{--<div class="carousel-caption d-md-block"> <img src="img/quote-icon.png" alt="">--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<p hidden>{{$i = 0}}</p>--}}
                {{--@foreach($Team as $item)--}}
                    {{--@if($i == 0)--}}
                        {{--<li class="active" data-target="#my-carousel" data-slide-to={{$i}} aria-current="location" > <img src="{{'/storage/Team/'.$item->file}}" alt=""> <span>Sherrie Rose</span> </li>--}}
                    {{--@else--}}
                        {{--<li data-target="#my-carousel" data-slide-to={{$i}} > <img src="{{'/storage/Team/'.$item->file}}" alt=""> <span>Sherrie Rose</span> </li>--}}
                    {{--@endif--}}
                    {{--{{$i++}}--}}
                {{--@endforeach--}}
                {{--<li data-target="#my-carousel" data-slide-to="1" > <img src="img/about-me-img2.png" alt=""> <span>Sherrie Rose</span> </li>--}}
                {{--<li data-target="#my-carousel" data-slide-to="2"> <img src="img/about-me-img3.png" alt=""> <span>Sherrie Rose</span> </li>--}}
                {{--<li data-target="#my-carousel" data-slide-to="3"> <img src="img/about-me-img3.png" alt=""> <span>Sherrie Rose</span> </li>--}}
                {{--<li data-target="#my-carousel" data-slide-to="4"> <img src="img/about-me-img3.png" alt=""> <span>Sherrie Rose</span> </li>--}}
                {{--<li data-target="#my-carousel" data-slide-to="5"> <img src="img/about-me-img3.png" alt=""> <span>Sherrie Rose</span> </li>--}}
                {{--<li data-target="#my-carousel" data-slide-to="6"> <img src="img/about-me-img3.png" alt=""> <span>Sherrie Rose</span> </li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--social media--}}
    <div class="container-fluid fh5co-insta-feed activity">
        <div class="container recent">
            {{--<div class="row mb-5 pb-5">--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="twit-box">--}}
                        {{--<div class="media mb-3"> <img class="align-self-start mr-3 rounded-circle" src="img/twit-girl-img.png" alt="">--}}
                            {{--<div class="media-body">--}}
                                {{--<h5 class="mb-0 mt-3">Sandra reigel</h5>--}}
                                {{--<p>@sandraphotography</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<p class="text-justify"> “Sed ut perspiciatis unde omnis iste nats error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut. </p>--}}
                        {{--<div class="clearfix"> <a href="#" class="btn btn-primary mt-2 float-right">Follow</a> </div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 feed-caro">--}}
                    {{--<h2>Instagram feed</h2>--}}
                    {{--<div class="owl-carousel owl-carousel4 owl-theme">--}}
                        {{--<div>--}}
                            {{--<div class="card"> <img class="card-img" src="img/feed-img1.png" alt="">--}}
                                {{--<div class="card-img-overlay"> </div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                            {{--<div class="card"> <img class="card-img" src="img/feed-img2.png"  alt="">--}}
                                {{--<div class="card-img-overlay"> </div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <h2 class="text-center d-block">Find us on social media</h2>
            <div class="row social-links">
                <ul class="nav mx-auto">
                    @foreach($socialmedia as $item)
                        @if($item->name == "facebook")
                            <li class="nav-item"> <a class="nav-link" href="{{$item->link}}"><img style="width: 30px; height: 30px" src="img/fb.png" alt=""></a> </li>
                        @elseif($item->name == "instagram")
                            <li class="nav-item"> <a class="nav-link" href="{{$item->link}}"><img style="width: 30px; height: 30px" src="img/instagram.png" alt=""></a> </li>
                        @elseif($item->name == "twitter")
                            <li class="nav-item"> <a class="nav-link" href="{{$item->link}}"><img style="width: 30px; height: 30px" src="img/twitter.png" alt=""></a> </li>
                        @elseif($item->name == "youtube")
                            <li class="nav-item"> <a class="nav-link" href="{{$item->link}}"><img style="width: 30px; height: 30px" src="img/youtube.png" alt=""></a> </li>
                        @endif

                    {{--<li class="nav-item"> <a class="nav-link" href=""><img src="img/twitter.png" alt=""></a> </li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="#"><img src="img/pinterest.png" alt=""></a> </li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="#"><img src="img/google-plus.png" alt=""></a> </li>--}}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
