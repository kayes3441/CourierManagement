<?php

namespace App\Enums\ViewPath\Admin;

enum Dashboard
{
    const DASHBOARD_ROUTE = 'admin.dashboard.index';
    const DASHBOARD_URL = 'admin/dashboard';
    const DASHBOARD_VIEW = 'admin.dashboard.index';

    const INDEX = [
        URI => '/dashboard',
        VIEW => 'admin.dashboard.index'
    ];

}
