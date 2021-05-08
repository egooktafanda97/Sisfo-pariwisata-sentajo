<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commentWisata;

class CommentWisataController extends Controller
{
    public function sendComent(Request $req)
    {
        $post = $req->all();

        $data = [
            "nama"          => $post['nama'],
            "email"         => $post['email'],
            "subject"       => $post['subjek'],
            "post_id"       => $post['id'],
            "isi"           => $post['message'],
            "sub_comment"   => $post['sub_coment'],
            "status"        => '1',
        ];
        $sc = new commentWisata($data);
        $ex = $sc->save();
        if ($sc) {
            return redirect('/detailWisata/' . $post['id'])->with(['msg' => 'Berhasil', 'status' => true]);
        } else {
            return redirect('/detailWisata/' . $post['id'])->with(['msg' => 'Gagal', 'status' => false]);
        }
    }
}
