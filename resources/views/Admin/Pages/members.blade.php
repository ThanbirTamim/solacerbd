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
                    {{--<center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Promotional Message</h4></center><br>--}}
                        {{--onsubmit="loginFormSubmission();return false"--}}
                        {{--<form  class="form-group" action="/admin/sms_service" id="fupForm" method="post" enctype="multipart/form-data">--}}
                            {{--@csrf--}}
                            {{--<label for="name">Select a sms type...</label>--}}
                            {{--<select name="type" id="fabric_type_m" required>--}}
                                {{--<option value="single">Single</option>--}}
                                {{--<option value="group">Group</option>--}}
                                {{--<option value="all">All</option>--}}
                            {{--</select>--}}
                            {{--<textarea :maxlength="300" name="message" required rows="4" placeholder="your message in bangla"></textarea>--}}
                            {{--<textarea :maxlength="300" name="number" rows="4" placeholder="Single Number: (017xxxxx) or Group Number: (017xxxxx,019xxxxx,018xxxxxx)" :minlength="11"></textarea><br>--}}
                            {{--<button type="submit" class="btn btn-primary btn-sm" id="butsave">Send</button>--}}
                        {{--</form>--}}
                </div>
            </div>

        </div>
        <br>



        <div class="container">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Registered Customer Information</h4></center>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Address</th>
                            <th scope="col">Time</th>
                            {{--<th scope="col">Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="text-align: center">
                                <td>@if($item->name == null) {{ "None" }} @else {{ $item->name }} @endif</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->age}} Years</td>
                                <td>
                                    @if($item->gender == "1") {{ "Male" }} @else {{ "Female" }} @endif
                                </td>
                                <td>
                                    @if($item->fb_link == null) {{ "None" }} @else <a href="{{ $item->fb_link }}">URL</a> @endif
                                </td>
                                <td>
                                    @if($item->address == null) {{ "None" }} @else {{ $item->address }} @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>

                                {{--<td>--}}
                                    {{--@if(Auth::user()->role == 0)--}}
                                        {{--<form style="margin-top: 2px" class="" action="/admin/members/{{$item->id}}" method="post">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--<button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
                                        {{--</form>--}}
                                    {{--@else--}}
                                        {{--<form style="margin-top: 2px" class="" action="/admin/members/{{$item->id}}" method="post">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--<button disabled type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
                                        {{--</form>--}}
                                    {{--@endif--}}
                                {{--</td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $value->links() }}
                </div>

            </div>
        </div><br>
    </div>
@endsection
