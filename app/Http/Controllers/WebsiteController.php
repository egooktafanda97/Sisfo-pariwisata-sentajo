<?php

namespace App\Http\Controllers;

use App\Models\website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $data = [

            "Q" => website::first(),

        ];

        return view('page.setWeb', $data);
    }
    public function save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            
            $data = [
                "logo" => $name
            ];

        }
        if (website::count() > 0) {
            $up = website::whereid(website::first()['id'])->update($data);
            if ($up) {
                return response()->json(["status" => 200, "msg" => "berhasil"]);
            } else {
                return response()->json(["status" => 409, "msg" => "gagal"]);
            }
        } else {
            $website = new website($data);

            if ($website->save()) {
                return response()->json(["status" => 200, "msg" => "berhasil"]);
            } else {
                return response()->json(["status" => 409, "msg" => "gagal"]);
            }
        }
    }
}
