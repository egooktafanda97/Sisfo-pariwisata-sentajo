<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\commentBlog;
class CommentBlogController extends Controller
{
    public function commetBlog(Request $req){

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
        $sc = new commentBlog($data);
        $ex = $sc->save();
        if ($sc) {
            return redirect('/getBlog/'.$post['id'])->with(['msg' => 'Berhasil', 'status' => true]);
        } else {
            return redirect('/getBlog/'.$post['id'])->with(['msg' => 'Gagal', 'status' => false]);
        }

    }
}
