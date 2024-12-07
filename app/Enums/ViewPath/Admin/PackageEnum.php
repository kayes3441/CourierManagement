<?php

namespace App\Enums\ViewPath\Admin;

enum PackageEnum
{
    const INDEX = [
        URI => '/index',
        VIEW => 'admin.package.index'
    ];
    const LIST = [
        URI => '/list',
        VIEW => 'admin.package.list'
    ];
    const UPDATE = [
        URI => '/update',
        VIEW => 'admin.package.update'
    ];
    const UPDATE_STATUS = [
        URI => '/update-status',
        VIEW => 'admin.package.update-status'
    ];
    const DELETE = [
        URI => '/delete',
    ];

    const PENDING = 'pending';
    const IN_TRANSIT = 'in_transit';
    const DELIVERED = 'delivered';
    const CANCELLED = 'cancelled';
}
