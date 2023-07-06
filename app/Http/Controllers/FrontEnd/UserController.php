<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Services\UserService;
use App\Models\AffiliateHistory;
use App\Models\AffiliatePayment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('frontend.home');
        }

        $user = Auth::guard('web');
        $detail = UserService::getUsers(['id' => $user->id()])->first();

        $this->responseData['detail'] = $detail;

        return $this->responseView('frontend.pages.user.account');
    }
    public function updateUser(Request $request)
    {
        if($request->email == Auth::user()->email) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ],[
                'required' => 'Vui lòng điền trường này!'
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required'
            ],[
                'email' => 'Không đúng định dạng email',
                'required' => 'Vui lòng điền trường này!',
                'unique' => 'Email đã tồn tại trên hệ thống'
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sex = $request->sex ?? '';
        $user->avatar = $request->avatar ?? '';
        $user->save();

        return back()->with('successMessage', __('Successfully updated!'));
    }

    public function getFormPassword() 
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('frontend.home');
        }
        return $this->responseView('frontend.pages.user.resetPassword');
    }

    public function resetPassword(Request $request) 
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmed' => 'required|min:6'
        ],[
            'required' => 'Vui lòng điền trường này!',
            'min' => 'Mật khẩu không được nhỏ hơn :min ký tự!'
        ]);

        if($request->password != $request->password_confirmed ) {
            return back()->with('errorMessage', __('Mật khẩu không trùng nhau!'));
        }

        $user = User::find(Auth::user()->id);
        $user->password = $request->password;
        $user->save();
        
        return redirect()->route('frontend.home')->with('successMessage', __('Successfully updated!'));
    }

    public function loginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->back()->with('successMessage', __('Login successfully!'));
        }

        return redirect()->route('frontend.home');
    }

    public function signup(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            $params['status'] = Consts::STATUS['active'];
            // if ($params['affiliate_code'] != '') {
            //     $affiliate = User::where('affiliate_code', $params['affiliate_code'])->first();
            //     if ($affiliate) {
            //         $params['affiliate_id'] = $affiliate->id;
            //     } else {
            //         abort(422, __('Affiliate code is not existed!'));
            //         // throw new Exception(__('Affiliate code is not existed!'));
            //     }
            // }

            $user = UserService::createUser($params);
            DB::commit();

            Auth::guard('web')->login($user);

            session()->flash('successMessage', 'Signup successfully!');
            return $this->sendResponse($user, __('Signup successfully!'));
        } catch (Exception $ex) {
            DB::rollBack();
            abort(422, __($ex->getMessage()));
        }
    }

    public function login(LoginRequest $request)
    {
        $current = $request->input('current') ?? route('frontend.home');
        $referer = $request->input('referer') ?? '';
        $url = $current == route('frontend.login') ? $referer : $current;
        if (Auth::guard('web')->check()) {
            return $this->sendResponse('', 'success');
        }

        try {
            $email = $request->email;
            $password = $request->password;
            $attempt = Auth::guard('web')->attempt([
                'email' => $email,
                'password' => $password,
                'status' => Consts::USER_STATUS['active']
            ]);

            if (!$attempt) {
                abort(401, __('Login failed!'));
            }

            session()->flash('successMessage', 'Login successfully!');
            return $this->sendResponse(['url' => $url], 'success');
        } catch (Exception $ex) {
            abort(422, __($ex->getMessage()));
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->forget('cart');
        return redirect()->back()->with('successMessage', __('Logout successfully!'));
    }

}
