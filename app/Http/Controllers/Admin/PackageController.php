<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GlobalConstant;
use App\Enums\ViewPath\Admin\PackageEnum;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\PackageAddUpdateRequest;
use App\Models\Admin;
use App\Models\Package;
use App\Services\PackageService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Brian2694\Toastr\Facades\Toastr ;

class PackageController extends BaseController
{
    public function __construct(
        private readonly PackageService $packageService,
        private readonly Admin          $admin,
        private readonly Package        $package,
    )
    {

    }
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
       return $this->getAddView();
    }
    protected function getAddView():view
    {
        $allCourier = $this->admin->where(['user_type'=>'courier'])->get();
        return view(PackageEnum::INDEX[VIEW],compact('allCourier'));
    }

    public function add(PackageAddUpdateRequest $request):RedirectResponse
    {
        $lastTrackingData = $this->package->latest('id')?->value('tracking_number') ?? 0;
        $request['lastTrackingData'] = $lastTrackingData+1;
        $this->package->create($this->packageService->getAddUpdateData(request:$request));
        Toastr::success('Added Successfully');
        return redirect()->back();
    }

    public function getList(Request $request,$status): View
    {
        $search = $request['search'] ?? null;
        $packages = $this->package->with('courier')
            ->when($search, function ($query) use($search){
                $query->Where('title', 'like', "%".$search."%");
            })->when($status == PackageEnum::PENDING, function ($query) {
               return $query->where('status',0);
            })->when($status == PackageEnum::IN_TRANSIT, function ($query) {
                    return $query->where('status',1);
            })->when($status == PackageEnum::DELIVERED, function ($query) {
                    return $query->where('status',2);
            })
            ->when($status == PackageEnum::CANCELLED, function ($query) {
                return $query->where('status',3);
            })
            ->orderBy('id','desc')
            ->simplePaginate(GlobalConstant::PAGINATE_LENGTH);

        return view(PackageEnum::LIST[VIEW],compact('packages'));
    }
    public function getUpdateView($id):View
    {
        $allCourier = $this->admin->where(['user_type'=>'courier'])->get();
        $package = $this->package->with('courier')->where('id',$id)->first();
        return view(PackageEnum::UPDATE[VIEW],compact('package','allCourier'));
    }

    public function update(PackageAddUpdateRequest $request, $id):RedirectResponse
    {
        $lastTrackingData = $this->package->where(['id'=>$id])?->value('tracking_number');
        $request['lastTrackingData'] = $lastTrackingData;
        $this->package->find($id)->update($this->packageService->getAddUpdateData(request:$request));
        Toastr::success('Update Successfully');
        return redirect()->back();
    }
    public function getUpdateStatusView($id):View
    {
        $package = $this->package->with('courier')->where('id',$id)->first();
        return view(PackageEnum::UPDATE_STATUS[VIEW],compact('package',));
    }
    public function updateStatus(Request $request,$id):RedirectResponse
    {
        $this->package->find($id)->update(['status'=>$request['status']]);
        Toastr::success('Update Status Successfully');
        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $this->package->where('id',$id)->delete();
        Toastr::success('Delete Successfully');
        return redirect()->back();
    }

}
