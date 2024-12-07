<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\ViewPath\Admin\Auth as AuthEnum;
use App\Enums\ViewPath\Admin\Dashboard;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Providers\RouteServiceProvider;
use App\Services\AdminService;
use App\Services\LoginService;
use Brian2694\Toastr\Facades\Toastr ;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends BaseController
{
    public function __construct(
        private readonly AdminService $adminService,
        private readonly LoginService $loginService,
        private readonly Admin $admin,
        private readonly AdminRole $adminRole,
    )
    {

    }

    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        return $this->getView();
    }

    protected function getView():View|RedirectResponse
    {

        if (Auth::guard('admins')->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        $adminCount=$this->admin->get()->count();
        if ($adminCount ==0 ){
            $this->storeDataForMasterAdmin();
        }
        return view(AuthEnum::ADMIN_LOGIN);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $admin = $this->admin->where('email', $request['email'])->first();
        if (isset($admin)) {
            if ($this->loginService->isLoginSuccessful($request['email'], $request['password'])) {
                Toastr::success('login successfully');
                return redirect(Dashboard::DASHBOARD_URL);
            }
        }
        Toastr::warning('credentials not matched!!!!!');
        return redirect()->back()->withInput($request->only('email','password'));
    }

    public function logout(): RedirectResponse
    {
        $this->loginService->logout();
        Toastr::success('logout successfully');
        return redirect(RouteServiceProvider::LOGIN);
    }

    private function storeDataForMasterAdmin(): Void
    {
        $adminRole = [
            'role' => 'Master Admin',
            'modules' =>['all'],
        ];
        $adminData = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '12345678',
        ];
        $this->adminRole->create($this->adminService->getAdminRoleData(request: $adminRole));
        $this->admin->create($this->adminService->getAddData(request: $adminData,roleId: 1));

    }

}
