@extends('layout.admin.master')
@section('title')Dashboard @endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard Overview</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Package</h5>
                    <p class="card-text">{{$totalPackage}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Pending Package</h5>
                    <p class="card-text">{{$pendingPackage}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">In Transit Package</h5>
                    <p class="card-text">{{$inTransitPackage}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Delivered Package</h5>
                    <p class="card-text">{{$deliveredPackage}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 d-flex gap-3">
            <h2>My Package</h2>
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <table class="table  table-striped table-hover">
                <thead class="table-dark text-nowrap ">
                <tr>
                    <th>#</th>
                    <th>Courier Name</th>
                    <th>Tracking Number</th>
                    <th>Sender  Name</th>
                    <th>Receiver Name</th>
                    <th>Pickup Address</th>
                    <th>Delivery Address</th>
                    <th>Shipping Cost</th>
                    <th>status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packages as $key=>$package)
                    <tr>
                        <td>{{$packages->firstItem()+$key}}</td>
                        <td>{{$package->courier?->name}}</td>
                        <td>{{$package['tracking_number']}}</td>
                        <td>{{$package['sender_name']}}</td>
                        <td>{{$package['receiver_name']}}</td>
                        <td>{{$package['pickup_address']}}</td>
                        <td>{{$package['delivery_address']}}</td>
                        <td>{{$package['shipping_cost']}}</td>
                        <td>
                            <span class="text-dark">
                                {{$package['status'] == 0 ? 'Pending' : ($package['status'] == 1 ? 'In Transit' : ($package['status'] == 2 ? 'Delivered' : 'Cancelled'))}}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <div class="d-flex justify-content-lg-end">
                {!! $packages->links() !!}
            </div>
        </div>
        <div class="d-flex justify-content-center">
            @if(count($packages) == 0)
                <span>No data Found</span>
            @endif
        </div>
    </div>
@endsection
