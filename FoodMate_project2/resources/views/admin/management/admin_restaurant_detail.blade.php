@extends('admin.management.layout.app')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurant Detail</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
                <li class="breadcrumb-item">Restaurants</li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #EA1B25;">Restaurant Detail</li>
            </ol>
        </div>
        <div class="row">
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
                            @foreach($restaurant_detail as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->restaurant_name}}</td>
                                    <td>{{$r->owner_name}}</td>
                                    <td>{{$r->telephone}}</td>
                                    <td>{{$r->email}}</td>
                                    <td>{{$r->address}}</td>
                                    @if($r->status == 1)
                                        <td><span class="badge badge-info">Pending</span></td>
                                        <td>
                                            <a href="./management-restaurant-detail/status/{{$r->id}}/{{$r->status}}" class="btn btn-sm btn-success">Accept </a>
                                            <a href="javascript:void(0);" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModalDelete" >Refuse</a>
                                        </td>
                                    @endif
                                    @if($r->status == 2)
                                        <td><span class="badge badge-warning">Wait for pay</span></td>
                                        <td>
                                            <a href="./management-restaurant-detail/status/{{$r->id}}/{{$r->status}}" class="btn btn-sm btn-success">Active </a>
                                            <a href="javascript:void(0);" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModal{{$r->id}}" >Delete</a>
                                        </td>
                                    @endif
                                    @if($r->status == 3)
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="./management-restaurant-detail/status/{{$r->id}}/{{$r->status}}" class="btn btn-sm btn-success">Expired </a>
                                            <a href="javascript:void(0);" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModal{{$r->id}}" >Delete</a>
                                        </td>
                                    @endif
                                    @if($r->status == 4)
                                        <td><span class="badge badge-danger">Expired </span></td>
                                        <td>
                                            <a href="./management-restaurant-detail/status/{{$r->id}}/2" class="btn btn-sm btn-success">Active </a>
                                            <a href="javascript:void(0);" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModal{{$r->id}}" >Delete</a>
                                        </td>
                                    @endif
{{--                                    @if($r->status == 5)--}}
{{--                                        <td><span class="badge badge-dark">Stop Working</span></td>--}}
{{--                                        <td>--}}
{{--                                            <a href="./management-restaurant-detail/status/{{$r->id}}/1" class="btn btn-sm btn-success">Accept </a>--}}
{{--                                            <a href="javascript:void(0);" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModal{{$r->id}}" >Delete</a>--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive" style="margin-top: 50px;">
                        <table class="table align-items-center table-bordered">
                            <tbody>
                            @foreach($restaurant_detail as $r)
                            <tr>
                                <td>Avatar Restaurant:</td>
                                <td><img style="max-width: 300px; max-height: 200px" src="./images/resource/{{$r->avatar}}"></td>
                            </tr>
                            <tr>
                                <td>Telephone of manager:</td>
                                <td>{{$r->tel_owner}}</td>
                            </tr>
                            <tr>
                                <td>Business License:</td>
                                <td>
                                    <?php

                                            $str = explode(',', $r->business_license);
                                    ?>
                                @if( count($str) > 1 )
                                        @for($i = 0; $i < count($str); $i++)
                                          <a href="./management-restaurant-detail/download/{{$str[$i]}}/{{$r->id}}">{{$str[$i]}}</a>
                                        @endfor
                                    @else
                                        <a href="./management-restaurant-detail/download/{{$r->business_license}}/{{$r->id}}">{{$r->business_license}}</a>
                                    @endif
                                </td>


                            </tr>
                            @if($r->package == 0)
                                <tr>
                                <td>Subscription package</td>
                                <td>Not Yet</td>
                                </tr>
                                <tr>
                                    <td>Start Day:</td>
                                    <td>Not Yet</td>
                                </tr>
                                <tr>
                                    <td>End Date:</td>
                                    <td>Not Yet</td>
                                </tr>
                            @else
                                <tr>
                                    <td>Subscription package</td>
                                    <td>{{$r->package}}</td>
                                </tr>
                                <tr>
                                    <td>Start Day:</td>
                                    <td>{{$r->start_date}}</td>
                                </tr>
                                <tr>
                                    <td>End Date:</td>
                                    <td>{{$r->end_date}}</td>
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="./management-restaurants" class="btn btn-dark" style="margin-top: 20px;"><i
                        class="fa fa-chevron-left"></i> Back to restaurant</a>
            </div>
        </div>
        <!--                Modal Delete Restaurant-->
        <div class="modal fade" id="deleteModalDelete" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabelDeleteRestaurant"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelDeleteRestaurant">What is your reason?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea style="width: 100%" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                        <a href="./management-restaurant-detail/delete/{{$r->id}}" class="btn btn-danger">Yes</a>
                    </div>
                </div>
            </div>
        </div>
{{--modal stauts restaurant--}}
        @foreach($restaurant_detail as $r)
            <div class="modal fade" id="deleteModal{{$r->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabelDeleteRestaurant"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelDeleteRestaurant">What is your reason?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea style="width: 100%" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                            <a href="./management-restaurant-detail/stop/{{$r->id}}" class="btn btn-danger">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

        <!-- Modal Accept Order -->
        <div class="modal fade" id="acceptOrder" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Accept Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="time">Estimated time for food processing and delivery :</label>
                                <input type="number" class="form-control" id="time" aria-describedby="emailHelp"
                                       placeholder="Enter amount ( minutes )">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success">Send to customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Reject Order -->
        <div class="modal fade" id="rejectOrder" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Reject Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="reason">Reason of rejection: </label>
                                <textarea class="form-control" id="reason" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Reject this order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!---Container Fluid-->
@endsection
