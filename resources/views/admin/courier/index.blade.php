@extends('layout.admin.master')
@section('title')Add Courier @endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <h2>Add Courier</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{route('admin.courier.index')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
                @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
                @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
                @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Courier as</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input user-type-checkbox" type="checkbox"  name="user_type" value="admin">
                    <label class="form-check-label">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input user-type-checkbox" type="checkbox" name="user_type" value="courier">
                    <label class="form-check-label">Courier </label>
                </div>
                @error('user_type')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 role-name d-none">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" name="role" placeholder="Enter Role Name">
                @error('role')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 role-permission d-none">
                <label for="name" class="form-label">Role Permission</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="modules[]" value="package_management">
                    <label class="form-check-label" for="inlineCheckbox1">Package Management</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="modules[]" value="package_management_update">
                    <label class="form-check-label" for="inlineCheckbox1">Package Management Update</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="modules[]" value="Courier_management">
                    <label class="form-check-label" for="inlineCheckbox2">Courier Management</label>
                </div>
            </div>
            <div class="courier-as-courier d-none">
                <input type="text" class="form-control" name="role" value="courier" placeholder="Enter Role Name" hidden>
                <input class="form-check-input" type="text"  name="modules[]" value="package_management_update" hidden>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ dynamicAsset('public/assets/js/courier.js') }}"></script>
@endpush
