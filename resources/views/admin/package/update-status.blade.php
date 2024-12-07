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
            <form action="{{route('admin.package.update-status',['id'=>$package['id']])}}" method="post">
                @csrf
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
