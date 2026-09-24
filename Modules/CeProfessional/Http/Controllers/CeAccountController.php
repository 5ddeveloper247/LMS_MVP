<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendGeneralEmail;
use App\UserLogin;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\CeProfessional\Http\Requests\CePasswordUpdateRequest;

class CeAccountController extends Controller
{
    public function show()
    {
        $account = Auth::user();

        return view('ceprofessional::account.index', compact('account'));
    }

    public function updatePassword(CePasswordUpdateRequest $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $user = Auth::user();

            if (! Hash::check($request->old_password, $user->password)) {
                Toastr::error(trans('student.Password Do not match'), trans('common.Failed'));

                return redirect()->back();
            }

            $user->update([
                'password' => bcrypt($request->new_password),
            ]);

            $login = UserLogin::where('user_id', Auth::id())->where('status', 1)->latest()->first();
            if ($login) {
                $login->status = 0;
                $login->logout_at = Carbon::now(Settings('active_time_zone'));
                $login->save();
            }

            SendGeneralEmail::dispatch($user, 'PASS_UPDATE', [
                'time' => Carbon::now()->format('d-M-Y, g:i A'),
            ]);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }
}
