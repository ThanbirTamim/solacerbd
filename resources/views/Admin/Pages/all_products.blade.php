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
                        <form  class="form-group" action="/admin/all_products" id="fupForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" type="text" :maxlength="300" name="name" required placeholder="Product Name (Max character 191)">
                            <input class="" type="text" name="price" required placeholder="Product Price (Number Only)">
                            {{--<input class="" type="text" name="max_size" placeholder="Product Max Size (Number Only)">--}}
                            {{--<input class="" type="text" name="min_size" placeholder="Product Min Size (Number Only)">--}}
                            <label for="size_type">Choose a size:</label>
                            <select name="size_type" id="size_type" required>
                                <option value="all">All</option>
                                <option value="xs">XS</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                                <option value="4xl">4XL</option>
                            </select>
                            <label for="size_type">Choose a gender:</label>
                            <select name="gender_type" id="gender_type" required>
                                <option value="all">All</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="age_type">Choose a age:</label>
                            <select name="age_type" id="age_type">
                                <option value="all">All</option>
                                <option value="child">Child (0-12 years)</option>
                                <option value="adolescence">Adolescence (13-18 years)</option>
                                <option value="adult">Adult (19-59 years)</option>
                                <option value="senior adult">Senior Adult (60 years and above)</option>
                            </select>
                            <label for="product_type">Choose a product type:</label>
                            <select name="product_type" id="product_type" required>
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
                            <label for="fabric_type">Choose a febric type:</label>
                            <select name="fabric_type" id="fabric_type" required>
                                <option value="cotton">Cotton</option>
                                <option value="linen">Linen</option>
                                <option value="wool">Wool</option>
                                <option value="silk">Silk </option>
                                <option value="polyester">Polyester</option>
                                <option value="chinese">Chinese</option>
                                <option value="silk">Silk</option>
                                <option value="jens">Jens </option>
                                <option value="nylon">Nylon</option>
                                <option value="kapok">Kapok</option>
                                <option value="jute">Jute</option>
                                <option value="hemp">Hemp</option>
                                <option value="ramie">Ramie</option>
                                <option value="sisal">Sisal</option>
                                <option value="coir">Coir</option>
                                <option value="pina">Pina</option>
                                <option value="hair">Hair</option>
                            </select>
                            <textarea :maxlength="2000" name="description" required rows="4" placeholder="Description (Max character 2000)"></textarea>
                            <textarea :maxlength="2000" name="tag" required rows="4" placeholder="tag (Max character 500) (ex: tag1, tag2, tag3 )"></textarea>
                            <label for="file1">1st Picture:</label>
                            <input class="" id="file1" type="file" name="file1" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file2">2nd Picture</label>
                            <input class="" id="file2" type="file" name="file2" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file3">3rd Picture</label>
                            <input class="" id="file3" type="file" name="file3" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file1">4th Picture:</label>
                            <input class="" id="file4" type="file" name="file4" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file2">5th Picture</label>
                            <input class="" id="file5" type="file" name="file5" accept=".png, .jpg, .jpeg" required><br>
                            <label for="file3">6th Picture</label>
                            <input class="" id="file6" type="file" name="file6" accept=".png, .jpg, .jpeg" required><br>
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
                            <th scope="col">Price</th>
                            <th scope="col">Size Type</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age Type</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Febric Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $item)
                            <tr style="width: 100%">
                                <td style="width: 7%">
                                    {{$item->name}}
                                </td>
                                <td style="width: 7%">
                                    {{$item->price}}
                                </td>
                                <td style="width: 7%">
                                    {{$item->size_type}}
                                </td>
                                <td style="width: 7%">
                                    {{$item->gender_type}}
                                </td>
                                <td style="width: 7%">
                                    {{$item->age_type}}
                                </td>
                                <td style="width: 7%">{{$item->product_type}}</td>
                                <td style="width: 7%">{{$item->fabric}}</td>
                                <td style="width: 20%">{{$item->description}}</td>
                                <td style="width: 15%"><img src="{{'/storage/AllProducts/'.$item->file1}}" style="width:100%; border-radius: 10px; border: 2px solid black; margin-bottom: 5px" class="img-responsive"></td>
                                <td style="width: 8%">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td style="width: 8%">
                                    <form style="margin-top: 2px" class="" action="/admin/all_products/{{$item->id}}" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td style="width: 5%">
                                    {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</button>--}}
                                    <button onclick="updateProductInfoPassModal(this)" class="btn btn-primary btn-sm"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-price="{{$item->price}}"
                                            data-size_type="{{$item->size_type}}"
                                            data-gender_type="{{$item->gender_type}}"
                                            data-age_type="{{$item->age_type}}"
                                            data-product_type="{{$item->product_type}}"
                                            data-febric_type = "{{$item->fabric}}"
                                            data-description="{{$item->description}}"
                                            data-tag="{{$item->tag}}"
                                        {{--data-toggle="modal"--}}
                                        {{--data-target="#exampleModal"--}}
                                        {{--data-whatever="@mdo"--}}
                                    >
                                        Edit
                                    </button>
                                </td>
                                {{--<form action="/admin/all_products/update" method="post" enctype="multipart/form-data">--}}
                                    {{--@csrf--}}

                                {{--</form>--}}

                            </tr>
                        @endforeach
                        <tr>
                        </tbody>
                    </table>
                    {{$value->links()}}
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
                                    <form  class="form-group" action="/admin/all_products/update" id="fupForm" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input readonly hidden class="" type="text" :maxlength="300" name="id" id="id_m" required value="">
                                        <input class="" type="text" :maxlength="300" name="name" id="name_m" required placeholder="Product Name (Max character 191)" value="">
                                        <input class="" type="text" name="price" id="price_m" required placeholder="Product Price (Number Only)">
                                        <label for="size_type">Choose a size:</label>
                                        <select name="size_type" id="size_type_m" required>
                                            <option value="all">All</option>
                                            <option value="xs">XS</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                            <option value="xxxl">XXXL</option>
                                            <option value="4xl">4XL</option>
                                        </select>
                                        <label for="size_type">Choose a gender:</label>
                                        <select name="gender_type" id="gender_type_m" required>
                                            <option value="all">All</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <label for="age_type">Choose a age:</label>
                                        <select name="age_type" id="age_type_m">
                                            <option value="all">All</option>
                                            <option value="child">Child (0-12 years)</option>
                                            <option value="adolescence">Adolescence (13-18 years)</option>
                                            <option value="adult">Adult (19-59 years)</option>
                                            <option value="senior adult">Senior Adult (60 years and above)</option>
                                        </select>
                                        <label for="product_type">Choose a product type:</label>
                                        <select name="product_type" id="product_type_m" required>
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
                                        <label for="fabric_type">Choose a fabric type:</label>
                                        <select name="fabric_type" id="fabric_type_m" required>
                                            <option value="cotton">Cotton</option>
                                            <option value="linen">Linen</option>
                                            <option value="wool">Wool</option>
                                            <option value="silk">Silk </option>
                                            <option value="jens">Jens </option>
                                            <option value="polyester">Polyester</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="silk">Silk</option>
                                            <option value="nylon">Nylon</option>
                                            <option value="kapok">Kapok</option>
                                            <option value="jute">Jute</option>
                                            <option value="hemp">Hemp</option>
                                            <option value="ramie">Ramie</option>
                                            <option value="sisal">Sisal</option>
                                            <option value="coir">Coir</option>
                                            <option value="pina">Pina</option>
                                            <option value="hair">Hair</option>
                                        </select>
                                        <textarea :maxlength="2000" name="description" id="description_m" required rows="4" placeholder="Description (Max character 2000)"></textarea>
                                        <textarea :maxlength="2000" name="tag" required rows="4" id="tag_m" placeholder="tag (Max character 500) (ex: tag1, tag2, tag3 )"></textarea>
                                        <label for="file1">1st Picture:</label>
                                        <input class="" id="file1" type="file" name="file1" accept=".png, .jpg, .jpeg"><br>
                                        <label for="file2">2nd Picture</label>
                                        <input class="" id="file2" type="file" name="file2" accept=".png, .jpg, .jpeg"><br>
                                        <label for="file3">3rd Picture</label>
                                        <input class="" id="file3" type="file" name="file3" accept=".png, .jpg, .jpeg"><br>
                                        <label for="file1">4th Picture:</label>
                                        <input class="" id="file4" type="file" name="file4" accept=".png, .jpg, .jpeg"><br>
                                        <label for="file2">5th Picture</label>
                                        <input class="" id="file5" type="file" name="file5" accept=".png, .jpg, .jpeg"><br>
                                        <label for="file3">6th Picture</label>
                                        <input class="" id="file6" type="file" name="file6" accept=".png, .jpg, .jpeg"><br>
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
            var price = (e.getAttribute("data-price"));
            var size_type = (e.getAttribute("data-size_type"));
            var gender_type = (e.getAttribute("data-gender_type"));
            var age_type = (e.getAttribute("data-age_type"));
            var product_type = (e.getAttribute("data-product_type"));
            var description = (e.getAttribute("data-description"));
            var febric_type = (e.getAttribute("data-febric_type"));
            var tag = (e.getAttribute("data-tag"));

            // console.log(id, name,price,size_type,gender_type, age_type,febric_type, product_type);

            document.getElementById("id_m").value = id;
            document.getElementById("name_m").value = name;
            document.getElementById("price_m").value = price;
            document.getElementById("size_type_m").value = size_type;
            document.getElementById("gender_type_m").value = gender_type;
            document.getElementById("age_type_m").value = age_type;
            document.getElementById("product_type_m").value = product_type;
            document.getElementById("fabric_type_m").value = febric_type;
            document.getElementById("description_m").value = description;
            document.getElementById("tag_m").value = tag;
            // document.getElementById("price_m").value = e.data-price;
            $("#exampleModal").modal()
        }
    </script>
@endsection
