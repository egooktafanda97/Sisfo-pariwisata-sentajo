<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            "Q" => User::all(),
        ];
        return view('page.account', $data);
    }
    public function addAdmin(Request $input)
    {
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ];
        $cek = User::where(["email" => $input->email])->count();
        if ($cek > 0) {

            if ($input->password == '1234') {
                unset($data['password']);
            }

            $us = User::where(["email" => $input->email])->update($data);

            if ($us) {
                return redirect('/account/')->with(['msg' => 'Berhasil', 'status' => true]);
            } else {
                return redirect('/account/')->with(['msg' => 'Gagal', 'status' => false]);
            }
        } else {
            $us = new User($data);
            if ($us->save()) {
                return redirect('/account/')->with(['msg' => 'Berhasil', 'status' => true]);
            } else {
                return redirect('/account/')->with(['msg' => 'Gagal', 'status' => false]);
            }
        }

    }

    public function deleteAccount(Request $request)
    {
        $id = $request->id;
        $del = User::where(["id" => $id])->delete();
        if ($del) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }
    }
}
