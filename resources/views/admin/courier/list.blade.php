@extends('layout.admin.master')
@section('title')List @endsection
@section('body')
    <div class="row">
        <div class="col-md-12 d-flex gap-3">
            <h2>Courier List</h2>
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <table class="table  table-striped table-hover">
                <thead class="table-dark text-nowrap ">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allCourier as $key=>$courier)
                    <tr>
                        <td>{{$allCourier->firstItem()+$key}}</td>
                        <td>{{$courier['name']}}</td>
                        <td>{{$courier['email']}}</td>
                        <td>{{$courier->role?->name}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{route('admin.courier.delete',['id'=>$courier['id']])}}" class="btn btn-warning btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <div class="d-flex justify-content-lg-end">
                {!! $allCourier->links() !!}
            </div>
        </div>
        @if(count($allCourier) == 0)
            <span>No data Found</span>
        @endif
    </div>
@endsection
