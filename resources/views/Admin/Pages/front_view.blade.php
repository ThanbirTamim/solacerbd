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
                    <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Add Picture</h4></center><br>
                        {{--onsubmit="loginFormSubmission();return false"--}}
                        <form  class="form-inline" action="/admin/front_view" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" id="title" type="text" name="title" placeholder="Title" :maxlength="100" :minlength="5" required>
                            Recommended image size (1600 X 800) <input class="" id="file" type="file" name="file" accept=".png, .jpg, .jpeg" required>
                            <button type="submit" class="btn btn-primary btn-sm" id="butsave">Upload</button>
                        </form>
                </div>
            </div>

        </div>
        <br>



        <div class="container">
            <center><h4 style="border-radius: 10px; background: linear-gradient(dodgerblue, white); border: 2px solid black; font-weight: bold; font-size: 1.6rem">Pictures:</h4></center>
            <div class="row">
                @foreach($value as $item)
                    <div class="col-sm-3" style="padding: 30px; margin: 10px">
                        <div class="panel panel-success">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <img src="{{'/storage/FrontView/'.$item->filename}}" style="width:100%; border-radius: 10px; border: 4px solid black; margin-bottom: 5px" class="img-responsive">
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <center style="margin-bottom: 4px;background: linear-gradient(slategrey, white); border-radius: 10px; border: 2px solid black; font-weight: bold; font-size: 0.8rem"> Title: {{$item->title}}, Added: {{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</center>
                                    </div>
                                </div>
                                @if($item->status == "false")
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <center style="background: linear-gradient(slategrey, white); border-radius: 10px; border: 2px solid black; font-weight: bold; font-size: 0.8rem"> Select for front view: <input class="" type="radio" name="status" value="{{$item->id}}" id="" onclick="statusCheckedChange(this)"></center>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <center style="background: linear-gradient(slategrey, white); border-radius: 10px; border: 2px solid black; font-weight: bold; font-size: 0.8rem"> Select for front view: <input class="" type="radio" name="status" value="{{$item->id}}" id="" checked onclick="statusCheckedChange(this)"></center>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="panel-footer">
                                <center>
                                    {{--start delete part--}}
                                    <form style="margin-top: 2px" class="" action="/admin/front_view/{{$item->id}}" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    {{--close delete part--}}
                                </center>


                            </div>
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div><br>
    </div>

    <script>
        function statusCheckedChange(e){
            var retVal = confirm("Do you really want to change front view?");
            if (retVal == true) {
                $.post('/admin/front_view/status_change', { '_token': "{{ csrf_token() }}", 's_id': e.value})
                    .done(function (data) {
                        //console.log(data);
                        if (data == "Done") {
                            alert("Changed");
                            window.open('/admin/front_view', "_self");
                        } else {
                            alert('Failed Somehow!!');
                        }
                    });
            } else {
                //return false;
                window.open('/admin/front_view', "_self");
            }
        }
    </script>
@endsection
