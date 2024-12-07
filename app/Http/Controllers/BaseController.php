<?php

namespace App\Http\Controllers;

use App\Contracts\BaseControllerInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseController extends Controller implements BaseControllerInterface
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
