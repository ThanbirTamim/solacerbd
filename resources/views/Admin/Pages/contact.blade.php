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
                    <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Add Information</h4></center><br>
                        {{--onsubmit="loginFormSubmission();return false"--}}
                        <form  class="form-group" action="/admin/contact" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="link" placeholder="Paste the link from google map...">
                            <textarea :maxlength="300" name="message" required rows="4" placeholder="Message"></textarea><br>
                            <button type="submit" class="btn btn-primary btn-sm" id="butsave">Add</button>
                        </form>
                </div>
            </div>

        </div>
        <br>

        <div class="container">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Informations</h4></center>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Link</th>
                            <th scope="col">Message</th>
                            <th scope="col">Added By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="">
                                <td>
                                    <?php echo substr($item->link, 0, 40).'......' ?>

                                </td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->added_by}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div><br>




        <div class="container">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Informations</h4></center>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Answered By</th>
                            <th scope="col">Time</th>
                            <th scope="col">Answer section</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value1 as $item)
                            {{--@if(strtotime($item->created_at)  == $now)--}}
                                {{--{{--}}
                                {{--$color = "green"--}}
                                {{--}}--}}
                            {{--@else--}}
                                {{--{{$color = "none"}}--}}
                            {{--@endif--}}
                            {{--->format('m/d/Y')--}}
                            {{--rgb(0.255.0) green--}}
                            {{--rgba(255,0,0,0.5) red--}}
                            {{--{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}} {{\Carbon\Carbon::parse($now)->diffForHumans()}}--}}
                            <tr style="">
                                <td>{{$item->name}}</td>
                                <td>{{$item->number}}</td>
                                <td>{{$item->message}}</td>
                                @if($item->status == "done")
                                    <td style="background: rgba(0,255,0,0.1)">
                                        {{$item->status}}
                                    </td>
                                @else
                                    <td style="background: rgba(255,0,0,0.1)">
                                        {{$item->status}}
                                    </td>
                                @endif
                                <td>{{$item->answer}}</td>
                                <td>{{$item->answered_by}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td style="width: 30%">
                                    <form style="margin-top: 2px" class="form-inline" action="/admin/contact/update" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input name="id" value="{{$item->id}}" hidden required>
                                        <input name="name" value="{{$item->name}}" hidden required>
                                        <input name="number" value="{{$item->number}}" hidden required>
                                        <input name="message" value="{{$item->message}}" hidden required>
                                        <textarea name="answer" rows="2" cols="5" placeholder="write answer" required></textarea>
                                        <button type="submit" class="btn btn-primary btn-sm">Send</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                        </tbody>
                    </table>
                    {{ $value1->links() }}
                </div>

            </div>
        </div><br>
    </div>
@endsection
