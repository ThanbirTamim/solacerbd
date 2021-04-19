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
                        <form  class="form-group" action="/admin/team" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" type="text" :maxlength="100" name="name" required placeholder="Person Name (Max character 100)">
                            <textarea :maxlength="300" name="description" required rows="4" placeholder="Person Description (Max character 300)"></textarea>
                            <label for="file">Picture:</label>
                            <input class="" id="file" type="file" name="file" accept=".png, .jpg, .jpeg" required><br>
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
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="">
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>{{$item->description}}</td>
                                <td><img src="{{'/storage/team/'.$item->file}}" style="width:100px;height:100px; border-radius: 10px; border: 2px solid black; margin-bottom: 5px" ></td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td>
                                    <form style="margin-top: 2px" class="" action="/admin/team/{{$item->id}}" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <button onclick="updateProductInfoPassModal(this)" class="btn btn-primary btn-sm"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-description="{{$item->description}}"
                                        {{--data-toggle="modal"--}}
                                        {{--data-target="#exampleModal"--}}
                                        {{--data-whatever="@mdo"--}}
                                    >
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  class="form-group" action="/admin/team/update" id="fupForm" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input readonly hidden class="" type="text" :maxlength="300" name="id" id="id_m" required value="">
                                        <input  class="" type="text" :maxlength="100" name="name" id="name_m" required value="" placeholder="Person Name (Max character 100)">
                                        <textarea :maxlength="300" name="description" id="description_m" required rows="4" placeholder="Person Description (Max character 300)"></textarea>
                                        <label for="file">Picture:</label>
                                        <input class="" id="file" type="file" name="file" accept=".png, .jpg, .jpeg"><br>
                                        <button type="submit" class="btn btn-primary btn-sm" id="butsave_m">Update</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><br>
    </div>

    <script>
        function updateProductInfoPassModal(e) {
            var id = (e.getAttribute("data-id"));
            var name = (e.getAttribute("data-name"));
            var description = (e.getAttribute("data-description"));

            // console.log(id, name,price,size_type,gender_type, age_type,febric_type, product_type);

            document.getElementById("id_m").value = id;
            document.getElementById("name_m").value = name;
            document.getElementById("description_m").value = description;
            // document.getElementById("price_m").value = e.data-price;
            $("#exampleModal").modal()
        }
    </script>
@endsection
