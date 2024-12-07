@extends('layout.admin.master')
@section('title')Update @endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h2>Update Task</h2>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="{{route('admin.package.update',['id'=>$package['id']])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Sender Name</label>
                    <input type="text" class="form-control" name="sender_name" value="{{$package['sender_name']}}" placeholder="Enter Sender Name">
                    @error('sender_name')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Receiver Name</label>
                    <input type="text" class="form-control" name="receiver_name" value="{{$package['receiver_name']}}" placeholder="Enter Receiver Name">
                    @error('receiver_name')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Delivery Address</label>
                    <textarea  class="form-control" name="delivery_address"  placeholder="Enter Delivery Address">{{$package['delivery_address']}}</textarea>
                    @error('delivery_address')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Pickup Address</label>
                    <textarea  class="form-control" name="pickup_address"  placeholder="Enter Pickup Address">{{$package['pickup_address']}}</textarea>
                    @error('pickup_address')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Courier Assign</label>
                    <select class="form-control" id="role" name="courier_id">
                        <option value="" selected disabled>-- select --</option>
                        @foreach($allCourier as $key=>$courier)
                            <option value="{{$courier['id']}}"{{$package['courier_id'] == $courier['id'] ? 'selected':''}}>{{$courier['name']}}</option>                        @endforeach
                    </select>
                    @error('courier_id')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Shipping Cost</label>
                    <input type="number" class="form-control" name="shipping_cost" value="{{$package['shipping_cost']}}" placeholder="Enter Shipping Cost">
                    @error('shipping_cost')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Status</label>
                    <select class="form-control" id="role" name="status">
                        <option value="0" {{$package['status'] == 0 ? 'selected' : ''}}>Pending</option>
                        <option value="1" {{$package['status'] == 1 ? 'selected' : ''}}>In Transit</option>
                        <option value="2" {{$package['status'] == 2 ? 'selected' : ''}}>Delivered</option>
                        <option value="3" {{$package['status'] == 3 ? 'selected' : ''}}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
