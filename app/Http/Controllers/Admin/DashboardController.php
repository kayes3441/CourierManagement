<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\Dashboard;
use App\Http\Controllers\BaseController;
use App\Models\Package;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends BaseController
{
    public function __construct(
        private readonly Package    $package,
    )
    {

    }
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getView();

    }
    protected function getView(): View
    {
        $id = auth('admins')->id();
        $userType = auth('admins')->user()->user_type;
        $packages = $this->package
            ->orderBy('status')->simplePaginate(GlobalConstant::PAGINATE_LENGTH);
        $totalPackage = empty($userType) || $userType == 'admin' ? $this->package->count() : $this->package->where('courier_id',$id)->count();
        $pendingPackage =empty($userType) || $userType == 'admin' ? $this->package->where('status',0)->count() :  $this->package->where('courier_id',$id)->where('status',0)->count();
        $inTransitPackage = empty($userType) || $userType == 'admin' ? $this->package->where('status',1)->count() :  $this->package->where('courier_id',$id)->where('status',1)->count();
        $deliveredPackage = empty($userType) || $userType == 'admin' ? $this->package->where('status',2)->count() :   $this->package->where('courier_id',$id)->where('status',2)->count();
        return view(Dashboard::INDEX[VIEW],compact('packages','totalPackage','pendingPackage','inTransitPackage','deliveredPackage'));
    }
}
