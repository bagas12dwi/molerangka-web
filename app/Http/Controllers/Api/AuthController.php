<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'class' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, 'Validation failed', $validator->errors());
        }

        // Simpan data pengguna baru ke dalam basis data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->class = $request->class;
        $user->password = bcrypt($request->password);
        $user->role = "user";
        $user->img_path = "";
        $user->save();

        // Autentikasi pengguna yang baru saja didaftarkan
        if (Auth::attempt($request->only('email', 'password'))) {
            // Autentikasi berhasil, kirimkan respons sukses bersama dengan data pengguna
            return ApiFormatter::createApi(200, 'success', $user);
        } else {
            // Autentikasi gagal, kirimkan pesan kesalahan
            return ApiFormatter::createApi(400, 'Login failed', ['error' => 'Authentication failed']);
        }
    }

    public function login(Request $request)
    {
        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        $data = User::select('id', 'name', 'email', 'class', 'role', 'img_path')->where('email', $inputan['email'])->first();

        if (Auth::attempt($inputan)) {
            // $request->session()->regenerate();
            return ApiFormatter::createApi(200, 'success', $data);
        }
        return ApiFormatter::createApi(400, 'failed');
    }

    public function getDetail(Request $request)
    {
        $id = $request->id;
        $data = User::select('id', 'name', 'email', 'class', 'role', 'img_path')->where('id', $id)->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'failed', $data);
        }
    }

    public function changePassword(Request $request)
    {
        $userId = $request->input('id_user');
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');

        $data = User::where('id', $userId)->first();

        if (password_verify($oldPassword, $data['password'])) {
            User::where('id', $userId)->update([
                'password' => bcrypt($newPassword)
            ]);

            return ApiFormatter::createApi(200, 'Success');
        } else {
            return ApiFormatter::createApi(200, 'Failed');
        }
    }

    public function changeProfilePicture(Request $request)
    {
        $userId = $request->input('id_user');
        $image = $request->file('image');

        $storeImg = $image->store('profile');

        $data = User::where('id', $userId)->update([
            'img_path' => $storeImg
        ]);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success');
        } else {
            return ApiFormatter::createApi(200, 'failed');
        }
    }
}
