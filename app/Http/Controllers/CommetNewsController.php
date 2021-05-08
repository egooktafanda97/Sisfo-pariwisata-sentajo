<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commet_news;

class CommetNewsController extends Controller
{
    public function commetBerita(Request $req)
    {
        // try {
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
            $sc = new Commet_news($data);
            $ex = $sc->save();
            if ($sc) {
                return redirect('/getBerita/'.$post['id'])->with(['msg' => 'Berhasil', 'status' => true]);
            } else {
                return redirect('/getBerita/'.$post['id'])->with(['msg' => 'Gagal', 'status' => false]);
            }
        // } catch (\Exception $e) {
        // }
    }
}
