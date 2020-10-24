<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;

class Login extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('uid', 'password');
        if (Auth::attempt($credentials)) {
            return $this->success('登录成功');
        }

        return $this->fail('用户名或密码错误,登录失败');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }

    public function showRepwdForm()
    {
        return view('user.repass');
    }

    public function repwd(Request $request)
    {
        $message = [
            'newpass.between' => '密码长度必须是6到12位',
        ];
        $validated = $request->validate(
            [
                'oldpass' => 'required',
                'newpass' => 'required|confirmed|between:6,12',
            ],
            $message
        );
        $user = Auth::user();
        if (Hash::check($validated['oldpass'], $user->password)) {
//            旧密码正确
            // 验证新密码是否是和旧密码一样,一样的话就不能更改
            if ($validated['oldpass'] == $validated['newpass']) {
                return $this->fail('新密码和旧密码一致,无需修改');
            }
            $user->password = Hash::make($validated['newpass']);
            $user->save();
            session()->flush();
            Auth::logout();

            return $this->success('密码修改成功');
        }

        return $this->fail('旧密码错误,请重试!');
    }

}
