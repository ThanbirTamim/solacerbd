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
                        <form  class="form-group" action="/admin/social_media" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Select a social media...</label>
                            <select name="name" id="fabric_type_m" required>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="twitter">Twitter</option>
                                <option value="youtube">Youtube</option>
                            </select>
                            <textarea :maxlength="300" name="link" required rows="4" placeholder="Link/Url"></textarea><br>
                            <button type="submit" class="btn btn-primary btn-sm" id="butsave">Upload</button>
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
                            <th scope="col">Name</th>
                            <th scope="col">Link</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="">
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>{{$item->link}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td>
                                    <form style="margin-top: 2px" class="" action="/admin/social_media/{{$item->id}}" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div><br>
    </div>
@endsection
