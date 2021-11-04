@extends('admin.layout.master')
@section('title', 'Admin - Product')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit product</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="./admin-dashboard/1">Home</a></li>
                <li class="breadcrumb-item text-dark">Product Management</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Edit Product</li>
            </ol>
        </div>
        <button type="button" class="btn btn-dark" onclick="window.location.href = '/admin-product/1'" style="margin-bottom: 20px; margin-top: -15px;"><i
                class="fa fa-chevron-left fa-sm"></i> Back to product list
        </button>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Edit product images : @for($i = 0; $i < 4; $i++)<span class="text-danger">{{$errors->first("image$i")}}</span>@endfor</h6>
                    </div>
                    <div class="card-body">
                        <form action="/admin-product-edit/images" method="post" enctype="multipart/form-data">
                            @csrf
                            @for($i = 0; $i < 4; $i++)
                                @if($i < count($product->productImages))
                                    <div class="profile-info text-center">
                                        <h5 class="text-dark">{{$i}}</h5>
                                            @if(count($product->productImages) != 1)
                                                <a class="text-dark" href="/admin-product-edit/images/delete/{{$product->productImages[$i]->id}}" style="margin-left: 60%;" title="Delete image"><i
                                                        class="fa fa-window-close fa-lg delete" style="cursor: pointer;"></i></a>
                                            @else
                                                <a class="text-dark" href="" style="margin-left: 60%;" title="Delete image"></a>
                                            @endif
                                        <div class="profile-thumb brd-rd50">
                                            <img class="profile-display" src="images/resource/{{$product->productImages[$i]->path}}" alt="profile-img1.jpg"
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
                                <input type="hidden" name="product-id" value="{{$product->id}}">
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
                        <h6 class="m-0 font-weight-bold text-dark">Edit product information :</h6>
                    </div>
                    <div class="card-body">
                        <form action="/admin-product-edit/info" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Id :</label>
                                <input type="text" class="form-control" name="product-id"
                                       placeholder="" value="{{$product->id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name :</label>
                                <input type="text" class="form-control" name="product-name" placeholder="Enter product name" value="{{$product->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category :</label>
                                <select class="form-control" name="category" id="exampleFormControlSelect1" required>
                                    @foreach($restaurantMenus as $restaurantMenu)
                                        <option {{$product->category->id == $restaurantMenu->category->id ? 'selected' : ''}} style="text-transform: capitalize" value="{{$restaurantMenu->category->id}}">{{$restaurantMenu->category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price :</label>
                                <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                                       placeholder="Price ( $ )" oninput="validity.valid||(value='');" min="0" value="{{$product->price}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discount :</label>
                                <input type="number" name="discount" class="form-control" id="exampleInputPassword1" required
                                       placeholder="Price ( $ )" min="0" oninput="validity.valid||(value='');" value="{{$product->discount ?? 0}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status :</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                                    <option value="1">In Stock</option>
                                    <option value="0">Out Stock</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description :</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{$product->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-right: 20px;">Update Info
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
