<?php

namespace App\Enums\ViewPath\Admin;

enum CourierEnum
{
    const INDEX = [
        URI => '/index',
        VIEW => 'admin.courier.index'
    ];
    const LIST = [
        URI => '/list',
        VIEW => 'admin.courier.list'
    ];
    const DELETE = [
        URI => '/delete',
    ];
}
