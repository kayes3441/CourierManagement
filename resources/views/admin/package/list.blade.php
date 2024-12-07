@extends('layout.admin.master')
@section('title')List @endsection
@section('body')
    <div class="row">
        <div class="col-md-12 d-flex gap-3">
            <h2>Package List</h2>
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
                    <th>Action</th>
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
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{route('admin.package.update',['id'=>$package['id']])}}" class="btn btn-info btn-sm">Update</a>
                                <a href="{{route('admin.package.update-status',['id'=>$package['id']])}}" class="btn btn-primary btn-sm">Status Update</a>
                                <a href="{{route('admin.package.delete',['id'=>$package['id']])}}" class="btn btn-warning btn-sm">Delete</a>
                            </div>
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
        @if(count($packages) == 0)
            <span>No data Found</span>
        @endif
    </div>
@endsection
