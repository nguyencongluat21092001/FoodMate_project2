@extends('admin.management.layout.app')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurant List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Restaurant List</li>
            </ol>
        </div>

        <div class="row">
            <div style="margin: 30px auto; width: 50%">
                <form class="navbar-search" method="post" action="./management-restaurant-search">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="search" class="form-control bg-light border-1 small"
                               placeholder="Enter restaurant name"
                               aria-label="Search" aria-describedby="basic-addon2"
                               style="border-color: #999999;" name="restaurant_name" value="{{isset($name_search) ? $name_search : ""}}">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Restaurant</th>
                                <th>Manager</th>
                                <th>Phone Restaurant</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($search_restaurant) && $search == 1)
                                @foreach($search_restaurant as $r)
                                    <tr>
                                        <td>{{$r->id}}</td>
                                        <td><a href="./management-restaurant-detail/{{$r->id}}">{{$r->restaurant_name}}</a></td>
                                        <td>{{$r->owner_name}}</td>
                                        <td>{{$r->telephone}}</td>
                                        <td>{{$r->email}}</td>
                                        <td>{{$r->address}}</td>
                                        @if($r->status == 1)
                                            <td><span class="badge badge-info">Pending</span></td>
                                        @endif
                                        @if($r->status == 2)
                                            <td><span class="badge badge-warning">Wait for pay</span></td>
                                        @endif
                                        @if($r->status == 3)
                                            <td><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if($r->status == 4)
                                            <td><span class="badge badge-danger">Expired </span></td>
                                        @endif
                                        <td>
                                            <a href="./management-restaurant-detail/{{$r->id}}" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif (isset($search) && $search == 0 && $search_restaurant == 1)
                                <div class="jumbotron text-center" style="background-color: white">
                                    <h1 class="display-3">Restaurant not found</h1>
                                    <p class="lead">There are no restaurant with name " {{$name_search}} "</p>
                                    <hr>
                                    <br>
                                </div>
                            @else
                                @foreach($restaurants as $r)
                                    <tr>
                                        <td>{{$r->id}}</td>
                                        <td><a href="./management-restaurant-detail/{{$r->id}}">{{$r->restaurant_name}}</a></td>
                                        <td>{{$r->owner_name}}</td>
                                        <td>{{$r->telephone}}</td>
                                        <td>{{$r->email}}</td>
                                        <td>{{$r->address}}</td>
                                        @if($r->status == 1)
                                            <td><span class="badge badge-info">Pending</span></td>
                                        @endif
                                        @if($r->status == 2)
                                            <td><span class="badge badge-warning">Wait for pay</span></td>
                                        @endif
                                        @if($r->status == 3)
                                            <td><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if($r->status == 4)
                                            <td><span class="badge badge-danger">Expired </span></td>
                                        @endif
                                        <td>
                                            <a href="./management-restaurant-detail/{{$r->id}}" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>

        <!--                Modal Delete Restaurant-->
@endsection
