@extends('admin.layout.master')
@section('title', 'Admin - Restaurant')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurant Info</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="/admin-dashboard/1">Home</a></li>
                <li class="breadcrumb-item text-dark">Restaurant Management</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Restaurant Info</li>
            </ol>
        </div>
        <button type="button" onclick="window.location.href='/admin-dashboard/1'" class="btn btn-dark" style="margin-bottom: 20px; margin-top: -15px;"><i
                class="fa fa-chevron-left fa-sm"></i> Back to dashboard
        </button>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Edit restaurant avatar : <span class="text-danger">{{$errors->first("imageavatar")}}</h6>
                    </div>
                    <div class="card-body">
                        <form action="/admin-restaurant/edit-avatar" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="profile-info text-center" style="width: 50%; margin-left: 25%;">
                                <div class="profile-thumb brd-rd50" style="width: 200px; height: 150px;">
                                    <img class="profile-display" src="images/resource/{{$restaurant->avatar}}" alt="profile-img1.jpg"
                                         itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer">
                                        CHANGE IMAGE
                                        <input class="profile-upload" name="img-avatar" type="file"/>
                                    </label>
                                </div>
                            </div>
                            <div class="btn-group" style="width : 40%;margin: 20px 30%;">
                                <button type="submit" class="btn btn-danger">Update Avatar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Edit restaurant images : @for($i = 0; $i < 4; $i++)<span class="text-danger">{{$errors->first("image$i")}}@endfor</h6>
                    </div>
                    <div class="card-body">
                        <form action="/admin-restaurant/edit-images" method="post" enctype="multipart/form-data">
                            @csrf
                            @for($i = 0; $i < 4; $i++)
                                @if($i < count($restaurant->restaurantImages))
                                    <div class="profile-info text-center">
                                        <h5 class="text-dark">{{$i}}</h5>
                                        @if(count($restaurant->restaurantImages) != 1)
                                            <a class="text-dark" href="/admin-restaurant/edit-images/delete/{{$restaurant->restaurantImages[$i]->id}}" style="margin-left: 60%;" title="Delete image"><i
                                                    class="fa fa-window-close fa-lg delete" style="cursor: pointer;"></i></a>
                                        @else
                                            <a class="text-dark" href="" style="margin-left: 60%;" title="Delete image"></a>
                                        @endif
                                        <div class="profile-thumb brd-rd50">
                                            <img class="profile-display" src="images/resource/{{$restaurant->restaurantImages[$i]->path}}" alt="profile-img1.jpg"
                                                 itemprop="image">
                                        </div>
                                        <div class="profile-img-upload-btn">
                                            <label class="fileContainer">
                                                CHANGE IMAGE
                                                <input class="profile-upload" name="img-{{$i}}" type="file"/>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <div class="profile-info text-center">
                                        <h5 class="text-dark">{{$i}}</h5>
                                        <a class="text-dark" href="" style="margin-left: 60%;" title="Delete image"></a>
                                        <div class="profile-thumb brd-rd50">
                                            <img class="profile-display" src="admin/img/unnamed.png" alt=""
                                                 itemprop="image">
                                        </div>
                                        <div class="profile-img-upload-btn">
                                            <label class="fileContainer">
                                                ADD IMAGE
                                                <input class="profile-upload" name="img-{{$i}}" type="file"/>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                            <div class="btn-group" style="width : 40%;margin: 40px 30%;">
                                <button type="submit" class="btn btn-danger">Update Images</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Edit restaurant information :</h6>
                    </div>
                    <div class="card-body">
                        <form action="/admin-restaurant/edit-info" method="post">
                            @csrf
                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" name="restaurant-id"
                                       placeholder="" value="{{$restaurant->id}}" readonly>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Package :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="" value="{{$restaurant->package}} months" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Restaurant name :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" name="restaurant-name"
                                       placeholder="Enter restaurant name" value="{{$restaurant->restaurant_name}}">
                            </div>
                            <div class="form-group">
                                <label for="select2Multiple">Category :</label>
                                <select class="select2-multiple form-control" name="" multiple="multiple"
                                        id="select2Multiple" disabled>
                                    @foreach($categories as $category)
                                        <option
                                            @foreach($restaurant->restaurantMenus as $menu)
                                                @if($menu->cate_id == $category->id)
                                                selected disabled
                                                @endif
                                            @endforeach
                                             value="{{$category->id}}">{{$category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2Multiple">Add more category :</label>
                                <select class="select2-multiple form-control" name="menus[]" multiple="multiple"
                                        id="">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option
                                            @foreach($restaurant->restaurantMenus as $menu)
                                            @if($menu->cate_id == $category->id)
                                            disabled
                                            @endif
                                            @endforeach
                                            value="{{$category->id}}">{{$category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Owner name :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" name="owner-name"
                                       placeholder="Enter owner name" value="{{$restaurant->owner_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Owner telephone :</label>
                                <input type="tel" class="form-control" id="exampleInputPassword1"
                                       name="owner-telephone" placeholder="Enter owner personal phone number" value="{{$restaurant->tel_owner}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telephone :</label>
                                <input type="tel" class="form-control" id="exampleInputPassword1"
                                       name="telephone" placeholder="Enter restaurant phone number" value="{{$restaurant->telephone}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email :</label>
                                <input type="email" class="form-control" id="exampleInputPassword1"
                                       name="email" placeholder="Enter restaurant email" value="{{$restaurant->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address :</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required>{{$restaurant->address}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-right: 20px;">Update Info
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
