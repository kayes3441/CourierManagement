<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\CourierEnum;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\CourierAddRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Services\AdminService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourierController extends BaseController
{
    public function __construct(
        private readonly AdminService $courierService,
        private readonly Admin       $courier,
        private readonly AdminRole       $adminRole,
    )
    {

    }

    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getAddView();
    }

    protected function getAddView():view
    {
        return view(CourierEnum::INDEX[VIEW]);
    }

    public function add(CourierAddRequest $request):RedirectResponse
    {
        $adminRole = $this->adminRole->create($this->courierService->getAdminRoleData(request: $request));
        $this->courier->create($this->courierService->getAddData(request:$request,roleId: $adminRole->id));
        Toastr::success('Added Successfully');
        return redirect()->back();
    }

    public function getList(): View
    {
        $allCourier = $this->courier->with('role')
            ->where(['user_type'=>'courier'])
            ->orderBy('id','desc')
            ->simplePaginate(GlobalConstant::PAGINATE_LENGTH);

        return view(CourierEnum::LIST[VIEW],compact('allCourier'));
    }
    public function delete($id): RedirectResponse
    {
        $courier =  $this->courier->where('id',$id)->first();
        $this->adminRole->where('id',$courier->admin_role_id)->delete();
        $courier->delete();
        Toastr::success('Delete Successfully');
        return redirect()->back();
    }
}
