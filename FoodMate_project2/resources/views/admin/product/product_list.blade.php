@extends('admin.layout.master')
@section('title','Admin - Products')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="./admin-dashboard/1">Home</a></li>
                <li class="breadcrumb-item text-dark">Product Management</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Product List</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div style="margin: 30px auto; width: 50%">
                        <form class="navbar-search" method="post" action="admin-product-search">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small"
                                       placeholder="Enter product name"
                                       aria-label="Search" aria-describedby="basic-addon2"
                                       style="border-color: #999999;" name="product-name">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        @if($products != null)
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="align-middle"><a href="#">{{$loop->index+1}}</a></td>
                                    <td class="align-middle">{{$product->category->cate_name}}</td>
                                    <td class="align-middle">{{$product->name}}.</td>
                                    <td class="align-middle"><img src="images/resource/{{$product->productImages[0]->path}}" alt=""
                                             style="width: 200px; height: 120px;"></td>
                                    <td class="align-middle">
                                        ${{$product->discount ?? $product->price}}.00
                                    </td>
                                    <td class="align-middle">
                                        @if($product->status == 1)
                                            <span class="badge badge-success">In Stock</span>
                                        @else
                                            <span class="badge badge-warning">Out Stock</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="/admin-product-edit/{{$product->id}}" class="btn btn-sm btn-dark"><i
                                                class="fa fa-pencil-alt fa-sm"></i> Edit</a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal{{$product->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Confirm Delete Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete product : "{{$product->name}}" ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No</button>
                                                <a href="/admin-delete-product/{{$product->id}}" class="btn btn-danger">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    @if($products == null)
                        <div class="jumbotron text-center" style="background-color: white">
                            <h1 class="display-3">Search Not Found</h1>
                            <p class="lead">Cannot found product name " {{$oldName}} "</p>
                            <hr>
                            <br>
                            <p class="lead">
                                <a class="btn btn-danger" href="/admin-product" role="button">Back to product list</a>
                            </p>
                        </div>
                    @endif
                    <div class="card-footer text-center align-items-center" style="margin-top: 50px">
                        @isset($products)
                            {{$products->links()}}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
@endsection
