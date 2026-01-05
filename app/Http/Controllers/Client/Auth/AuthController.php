<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Client\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\Client\Auth\ClientRegisterRequest;
use App\Trait\HasTransaction;

class AuthController extends Controller
{
    use HasTransaction;
    protected $userService;
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }
    public function create(): View
    {
        return view('client.pages.auth.register');
    }
    public function register(ClientRegisterRequest $request): RedirectResponse
    {
        try {
            $this->beginTransaction();
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->password),
            ];
            $user = User::where('email', $data['email'])->first();
            if ($user) {
                return back()
                    ->withErrors(['email' => 'Email này đã tồn tại trong hệ thống.Vui lòng nhập email mới.'])
                    ->withInput($request->except('password'));
            };
            $payload = User::create($data);
            $this->commit();
            return redirect()->route('auth.login');
        } catch (\Throwable $th) {
            $this->rollBack();
            throw $th;
        }
    }
    public function index(): View
    {
        return view('client.pages.auth.login');
    }
    public function login(AuthRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->input('email'))->first();
        // dd($user);
        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại trong hệ thống'])
                ->onlyInput('email');
        }
        if ($user->publish !== 2) {
            return back()->withErrors(['email' => 'Tài khoản của bạn đã bị vô hiệu hóa'])
                ->onlyInput('email');
        }
        $credentials = ([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác!'])
                ->onlyInput('email');
        }
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Đăng xuất tài khoản thành công');
    }
}
