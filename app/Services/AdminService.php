<?php

namespace App\Services;

class AdminService
{
    public function getAddData(object|array $request,int|null $roleId):array
    {
        return [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'user_type'    => $request?->user_type ?? 'admin',
            'admin_role_id'    => $roleId,
            'password' => bcrypt($request['password']),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    public function getUpdateData(object|array $request):array
    {
        return [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
            'status' => $request['status'],
            'updated_at' => now(),
        ];
    }
    public function getAdminRoleData(object|array $request):array
    {
        return [
            'name'     => $request['role'],
            'module_access'  => $request['modules'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function getAdminRoleUpdateData(object|array $request):array
    {
        return [
            'name'     => $request['role'],
            'module_access'     => $request['modules'],
            'updated_at' => now(),
        ];
    }

}
