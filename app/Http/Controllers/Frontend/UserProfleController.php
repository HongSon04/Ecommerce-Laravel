<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class UserProfleController extends Controller
{
    //
    public function index() {
        return view('frontend.dashboard.profile');
    }

    public function updateProfile(Request $request) {
        $request->validate(
            [
                'name' => 'required|max: 100',
                'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
                'phone' => 'required|numeric',
                'image' => 'image|max:5120',
                'bio' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.max' => 'Tên không được quá 100 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.numeric' => 'Số điện thoại phải là số',
                'bio.required' => 'Tiểu sử không được để trống',
                'image.image' => 'Ảnh không đúng định dạng',
                'image.max' => 'Ảnh không được quá 5MB',
            ],
            [
                'name' => 'Tên',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'bio' => 'Tiểu sử',
                'image' => 'Ảnh',
            ]
        );

        $user = Auth::user();
        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->file('image');
            $imageName = uniqid() . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/" . $imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();

        toastr()->success('Cập nhật thông tin thành công');
        return redirect()->back();
    }

    public function updatePassword(Request $request) {
        $request->validate(
            [
                'current_password' => ['required','current_password'],
                'password' => ['required','min:8','confirmed'],
            ],
            [
                'current_password.required' => 'Mật khẩu hiện tại không được để trống',
                'password.required' => 'Mật khẩu mới không được để trống',
                'password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
                'password.confirmed' => 'Mật khẩu mới không khớp',
            ],
            [
                'current_password' => 'Mật khẩu hiện tại',
                'password' => 'Mật khẩu mới',
            ]
        );

        // ? Cach 1
        /* $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save(); */
        // ? Cach 2
        $request->user()->update(['password' => bcrypt($request->password)]);

        toastr()->success('Cập nhật mật khẩu thành công');
        return redirect()->back();
    }
}
