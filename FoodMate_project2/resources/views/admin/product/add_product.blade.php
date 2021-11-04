@extends('admin.layout.master')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New product</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="./admin-dashboard/1">Home</a></li>
                <li class="breadcrumb-item">Product Management</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Add New Product</li>
            </ol>
        </div>
        <form action="" method="post" enctype="multipart/form-data" id="create-product-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark">Add product images : <span class="text-danger">{{session('error') ?? ''}}</span>@for($i = 0; $i < 4; $i++)<span class="text-danger">{{$errors->first("image$i")}}</span>@endfor</h6>
                        </div>
                        <div class="card-body">
                            <div class="profile-info text-center">
                                <h5 class="text-dark">0</h5>
                                <div class="profile-thumb brd-rd50">
                                    <img class="profile-display" src="admin/img/unnamed.png" alt="profile-img1.jpg"
                                         itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer">
                                        CHOOSE IMAGE
                                        <input class="profile-upload" name="img-0" type="file"/>
                                    </label>
                                </div>
                            </div>
                            <div class="profile-info text-center">
                                <h5 class="text-dark">1</h5>
                                <div class="profile-thumb brd-rd50">
                                    <img class="profile-display" src="admin/img/unnamed.png" alt="profile-img1.jpg"
                                         itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer">
                                        CHOOSE IMAGE
                                        <input class="profile-upload" name="img-1" type="file"/>
                                    </label>
                                </div>
                            </div>
                            <div class="profile-info text-center">
                                <h5 class="text-dark">2</h5>
                                <div class="profile-thumb brd-rd50">
                                    <img class="profile-display" src="admin/img/unnamed.png" alt="profile-img1.jpg"
                                         itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer">
                                        CHOOSE IMAGE
                                        <input class="profile-upload" name="img-2" type="file"/>
                                    </label>
                                </div>
                            </div>
                            <div class="profile-info text-center">
                                <h5 class="text-dark">3</h5>
                                <div class="profile-thumb brd-rd50">
                                    <img class="profile-display" src="admin/img/unnamed.png" alt="profile-img1.jpg"
                                         itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer">
                                        CHOOSE IMAGE
                                        <input class="profile-upload" name="img-3" type="file"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark">Create product information :</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter product name" name="product-name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category :</label>
                                <select class="form-control" required name="category" id="exampleFormControlSelect1">
                                    <option value="">Default</option>
                                    @foreach($restaurantMenus as $restaurantMenu)
                                        <option style="text-transform: capitalize" value="{{$restaurantMenu->category->id}}">{{$restaurantMenu->category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price :</label>
                                <input type="number" required oninput="validity.valid||(value='');" name="price" min="0"
                                       class="form-control" id="exampleInputPassword1" placeholder="Price ( $ )">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discount :</label>
                                <input type="number" required class="form-control" name="discount"
                                       oninput="validity.valid||(value='');" min="0" id="exampleInputPassword1"
                                       placeholder="Price ( $ )" >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description :</label>
                                <textarea class="form-control" required name="description"
                                          id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Create product</button>
                            <button type="button" class="btn btn-dark" onclick="window.location.href='/admin-product'" style="margin-left: 20px;">Back to product list
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
