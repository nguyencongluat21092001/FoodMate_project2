@extends('admin.layout.master')
@section('body')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./admin-dashboard/1">Home</a></li>
                <li class="breadcrumb-item">Orders</li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if($order != null)
                            <tbody>
                            @if(count($order->orderDetails) > 1)
                                @for($i = 0; $i < count($order->orderDetails); $i++)
                                    @if($i == 0)
                                        <tr>
                                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}"><a
                                                    href="#">#1</a></td>
                                            <td class="align-middle"
                                                rowspan="{{count($order->orderDetails)}}">{{$order->full_name}}</td>
                                            <td class="align-middle">{{\App\Models\Product::find($order->orderDetails[0]->product_id)->name}}</td>
                                            <td class="align-middle">{{$order->orderDetails[0]->qty}}</td>
                                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">
                                                @if($order->status == 'pending')
                                                    <span class="badge badge-info">Pending</span>
                                                @elseif($order->status == 'on-delivery')
                                                    <span class="badge badge-warning">On Delivery</span>
                                                @elseif($order->status == 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @elseif($order->status == 'processing')
                                                    <span class="badge badge-success">Processing</span>
                                                @elseif($order->status == 'canceled')
                                                    <span class="badge badge-light">Canceled</span>
                                                @else
                                                    <span class="badge badge-dark">Delivered</span>
                                                @endif
                                            </td>
                                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">
                                                @if($order->status == 'pending')
                                                    <a href="" data-toggle="modal" data-target="#acceptOrder"
                                                       class="btn btn-sm btn-success"><i class="fa fa-check fa-sm"></i>
                                                        Accept</a>
                                                    <a href="" data-toggle="modal" data-target="#rejectOrder"
                                                       class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash-alt fa-sm"></i> Reject</a>
                                                @elseif($order->status == 'on-delivery')
                                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal"
                                                       data-target="#showConfirm"><i
                                                            class="fa fa-check fa-sm"></i> Mark as delivered</a>
                                                @elseif($order->status == 'rejected' || $order->status == 'canceled')
                                                    <a href="" data-toggle="modal" data-target="#rejectOrder"
                                                       class="btn btn-sm btn-danger"><i class="fa fa-eye fa-sm"></i> See
                                                        reason</a>
                                                @elseif($order->status == 'processing')
                                                    <a href="/order-start-delivery/{{$order->id}}"
                                                       class="btn btn-sm btn-primary"><i
                                                            class="fa fa-car-alt fa-sm"></i> Start delivery</a>
                                                @else
                                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal"
                                                       data-target="#showConfirm"><i
                                                            class="fa fa-eye fa-sm"></i> See confirm image</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{\App\Models\Product::find($order->orderDetails[$i]->product_id)->name}}</td>
                                            <td>{{$order->orderDetails[$i]->qty}}</td>
                                        </tr>
                                    @endif
                                @endfor
                            @else
                                <tr>
                                    <td class="align-middle"><a
                                            href="#">#1</a></td>
                                    <td class="align-middle">{{$order->full_name}}</td>
                                    <td class="align-middle">{{\App\Models\Product::find($order->orderDetails[0]->product_id)->name}}</td>
                                    <td class="align-middle">{{$order->orderDetails[0]->qty}}</td>
                                    <td class="align-middle">
                                        @if($order->status == 'pending')
                                            <span class="badge badge-info">Pending</span>
                                        @elseif($order->status == 'on-delivery')
                                            <span class="badge badge-warning">On Delivery</span>
                                        @elseif($order->status == 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge badge-success">Processing</span>
                                        @elseif($order->status == 'canceled')
                                            <span class="badge badge-light">Canceled</span>
                                        @else
                                            <span class="badge badge-dark">Delivered</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($order->status == 'pending')
                                            <a href="" data-toggle="modal" data-target="#acceptOrder"
                                               class="btn btn-sm btn-success"><i class="fa fa-check fa-sm"></i>
                                                Accept</a>
                                            <a href="" data-toggle="modal" data-target="#rejectOrder"
                                               class="btn btn-sm btn-danger"><i class="fa fa-trash-alt fa-sm"></i>
                                                Reject</a>
                                        @elseif($order->status == 'on-delivery')
                                            <a href="" class="btn btn-sm btn-success" data-toggle="modal"
                                               data-target="#showConfirm"><i
                                                    class="fa fa-check fa-sm"></i> Mark as delivered</a>
                                        @elseif($order->status == 'rejected' || $order->status == 'canceled')
                                            <a href="" data-toggle="modal" data-target="#rejectOrder"
                                               class="btn btn-sm btn-danger"><i class="fa fa-eye fa-sm"></i> See reason</a>
                                        @elseif($order->status == 'processing')
                                            <a href="/order-start-delivery/{{$order->id}}"
                                               class="btn btn-sm btn-primary"><i class="fa fa-car-alt fa-sm"></i> Start
                                                delivery</a>
                                        @else
                                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal"
                                               data-target="#showConfirm"><i
                                                    class="fa fa-eye fa-sm"></i> See confirm image</a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <span class="text-danger" style="display: block;float: right">{{$errors->first('imageConfirm')}}</span>
                    </div>
                    <div class="table-responsive" style="margin-top: 50px;">
                        <table class="table align-items-center table-bordered">
                            <tbody>
                            <tr>
                                <td>Phone:</td>
                                <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{$order->address}}</td>
                            </tr>
                            <tr>
                                <td>Subtotal:</td>
                                <td>${{$order->total}}.00</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td>${{$order->total}}.00</td>
                            </tr>
                            <tr>
                                <td>Order Time:</td>
                                <td>{{date('H:i - M d, Y', strtotime($order->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Estimated delivery time: </td>
                                <td>{{date('H:i - M d, Y', strtotime($order->delivery_estimated)) ?? 'Not yet'}}</td>
                            </tr>
                            <tr>
                                <td>Delivered time:</td>
                                <td>
                                    @if($order->delivered_time != null)
                                        {{date('H:i - M d, Y', strtotime($order->delivered_time))}}
                                    @else
                                        Not yet
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="/admin-order" class="btn btn-dark" style="margin-top: 20px;"><i class="fa fa-chevron-left"></i>
                    Back to orders</a>
            </div>
        </div>
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
                    <form method="post" action="/admin-order/accept">
                        @csrf
                        <div class="modal-body">
{{--                            <div class="form-group">--}}
{{--                                <label for="time">Estimated time for food processing and delivery :</label>--}}
{{--                                <input type="datetime" class="form-control" id="time" name="estimated-amount"--}}
{{--                                       placeholder="Enter amount ( minutes )">--}}
{{--                                --}}
                                <input type="hidden" name="order-id" value="{{$order->id}}">
{{--                            </div>--}}
                            <div class="form-group" id="simple-date1">
                                <label for="simpleDataInput">Estimated delivered date & time</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" name="delivery-date" class="form-control" id="simpleDataInput">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group clockpicker" id="clockPicker2">
                                    <input type="text" name="delivery-time" class="form-control" value="12:30">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Send to customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Reject Order -->
        <div class="modal fade" id="rejectOrder" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                @if($order->status == 'rejected' || $order->status == 'canceled')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Order rejected</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason of {{$order->status == 'rejected' ? 'rejection' : 'canceled'}}: </label>
                                    <textarea class="form-control" id="reason" rows="4"
                                              disabled>{{$order->extra_info}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Back</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Reject Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/admin-order/reject">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason of rejection: </label>
                                    <textarea class="form-control" id="reason" name="reject-reason" rows="4"
                                              required></textarea>
                                    <input type="hidden" name="order-id" value="{{$order->id}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Reject this order</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @if($order->status == 'on-delivery')
            <div class="modal fade" id="showConfirm" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm order delivered</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/admin-order/mark-order-delivered" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="order-id" value="{{$order->id}}">
                                <div class="profile-info text-center" style="width: 50%; margin-left: 25%;">
                                    <div class="profile-thumb brd-rd50" style="width: 200px; height: 150px;">
                                        <img class="profile-display" src="images/resource/unnamed.png" alt=""
                                             itemprop="image">
                                    </div>
                                    <div class="profile-img-upload-btn">
                                        <label class="fileContainer">
                                            UPLOAD IMAGE
                                            <input class="profile-upload" name="img-confirm" type="file"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-group" style="width : 40%;margin: 20px 30%;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Update confirm image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endif
        @if($order->status == 'delivered')
            <div class="modal fade" id="showConfirm" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm order delivered</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body" style="height: 400px">
                                <div class="profile-info text-center" style="width: 450px; height: 350px">
                                    <div class="profile-thumb brd-rd50" style="width: 90%; height: 90%">
                                        <img class="profile-display" width="100%" height="auto" src="images/resource/{{$order->delivered_confirm}}" alt=""
                                             itemprop="image">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endif
    @endif
@endsection
