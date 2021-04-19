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
                        <form  class="" action="/admin/about_solacer" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" type="text" :maxlength="300" name="heading" required placeholder="Headline (Max character 200)">
                            <textarea :maxlength="2000" name="description" required rows="4" placeholder="Description (Max character 2000)"></textarea>
                            <label for="file1">Recommended image size (1920 * 1080)</label>
                            <input class="" id="file1" type="file" name="file1" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file2">Recommended image size (1920 * 1080)</label>
                            <input class="" id="file2" type="file" name="file2" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file3">Recommended image size  (800 * 800)</label>
                            <input class="" id="file3" type="file" name="file3" accept=".png, .jpg, .jpeg" required><br>
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
                            <th scope="col">Headline</th>
                            <th scope="col">Description</th>
                            <th scope="col">Picture1</th>
                            <th scope="col">Picture2</th>
                            <th scope="col">Picture3</th>
                            <th scope="col">Added_by</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr>
                                <td>{{$item->heading}}</td>
                                <td>{{$item->description}}</td>
                                <td><img src="{{'/storage/AboutSolacer/'.$item->file1}}" style="width: 150px;height: 90px; border-radius: 10px; border: 2px solid black; margin-bottom: 5px" class="img-responsive"></td>
                                <td><img src="{{'/storage/AboutSolacer/'.$item->file2}}" style="width: 150px;height: 90px; border-radius: 10px; border: 2px solid black; margin-bottom: 5px" class="img-responsive"></td>
                                <td><img src="{{'/storage/AboutSolacer/'.$item->file3}}" style="width: 90px;height: 90px; border-radius: 10px; border: 2px solid black; margin-bottom: 5px" class="img-responsive"></td>
                                <td>
                                    {{$item->added_by}}
                                    {{--<form style="margin-top: 2px" class="" action="/admin/about_solacer/{{$item->id}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{{ method_field('DELETE') }}--}}
                                        {{--<button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
                                    {{--</form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div><br>
    </div>

    <script>

    </script>
@endsection
