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
                    <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Password Reset</h4></center><br>
                        {{--onsubmit="loginFormSubmission();return false"--}}
                        <form  class="form-group" action="/admin/password_reset" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="old_pass" placeholder="old password" required>
                            <input type="text" name="new_pass" placeholder="new password" required>
                            <button type="submit" class="btn btn-primary btn-sm" id="butsave">Reset</button>
                        </form>
                </div>
            </div>

        </div>
        <br>
    </div>
@endsection
