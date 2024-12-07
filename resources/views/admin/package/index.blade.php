@extends('layout.admin.master')
@section('title')Add Package @endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <h2>Add Package</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{route('admin.package.index')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Sender Name</label>
                <input type="text" class="form-control" name="sender_name" placeholder="Enter Sender Name">
                @error('sender_name')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Receiver Name</label>
                <input type="text" class="form-control" name="receiver_name" placeholder="Enter Receiver Name">
                @error('receiver_name')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Delivery Address</label>
                <textarea  class="form-control" name="delivery_address"  placeholder="Enter Delivery Address"></textarea>
                @error('delivery_address')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Pickup Address</label>
                <textarea  class="form-control" name="pickup_address"  placeholder="Enter Pickup Address"></textarea>
                @error('pickup_address')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Courier Assign</label>
                <select class="form-control" id="role" name="courier_id">
                <option value="" selected disabled>-- select --</option>
                @foreach($allCourier as $key=>$courier)
                        <option value="{{$courier['id']}}">{{$courier['name']}}</option>
                    @endforeach
                </select>
                @error('courier_id')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Shipping Cost</label>
                <input type="number" class="form-control" name="shipping_cost" placeholder="Enter Shipping Cost">
                @error('shipping_cost')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
