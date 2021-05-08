<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentController extends Controller
{
    public function coment($slug, $id)
    {
        switch ($slug) {
            case 'berita':

                $data = [

                    "coment" => \App\Models\Commet_news::where(['post_Id' => $id, 'sub_comment' => '0'])->get(),
                    "class"     => \App\Models\Commet_news::class,
                    "id"        => $id,
                    "title"     => "Berita"

                ];

                break;

            case 'wisata':

                $data = [

                    "coment" => \App\Models\commentWisata::where(['post_Id' => $id, 'sub_comment' => '0'])->get(),
                    "class"     => \App\Models\commentWisata::class,
                    "id"        => $id,
                    "title"     => "Wisata"
                ];

                break;
                case 'blog':

                    $data = [
    
                        "coment" => \App\Models\commentBlog::where(['post_Id' => $id, 'sub_comment' => '0'])->get(),
                        "class"     => \App\Models\commentBlog::class,
                        "id"        => $id,
                        "title"     => "Blog"
                    ];
    
                    break;

            default:
                # code...
                break;
        }
        return view('page/listComment', $data);
    }
}
