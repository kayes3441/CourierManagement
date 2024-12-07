<?php

namespace App\Trait;

trait ModulePermissionTrait
{
    protected  function modulePermissionCheck($moduleName): bool
    {
        $userRole = auth('admins')->user()->role;
        $permission = $userRole->module_access;
        if (auth('admins')->user()->admin_role_id == 1) {
            return true;
        }
        if (isset($permission) && $userRole->status == 1 && in_array($moduleName, $permission) == true) {
            return true;
        }

        return false;
    }
}
