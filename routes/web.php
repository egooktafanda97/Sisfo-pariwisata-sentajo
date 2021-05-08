<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


use App\Models\Budaya;
use App\Models\Wisata;
use App\Models\CagarBudaya;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $budaya = \App\Models\Budaya::orderBy('created_at', 'DESC')->paginate(3);
    $wisata = \App\Models\Wisata::orderBy('created_at', 'DESC')->paginate(3);
    $cagarBudaya = \App\Models\CagarBudaya::orderBy('created_at', 'DESC')->paginate(3);
    $mapWisata = \App\Models\Wisata::select("id","koordinat","kecamatan","gambar","nama_wisata")->get();

    $_list = [];
    foreach ($wisata as $value) {
        $ls = [
            "id"    => $value->id,
            "img"   => $value->gambar,
            "name"  => $value->nama_wisata,
            "kategori_" => "wisata"
        ];
        array_push($_list, $ls);
    }

    foreach ($budaya as $val) {
        $ls = [
            "id"    => $val->id,
            "img"   => $val->gambar,
            "name"  => $val->nama_budaya,
            "kategori_" => "budaya"
        ];
        array_push($_list, $ls);
    }

    foreach ($cagarBudaya as $val_) {
        $ls = [
            "id"    => $val_->id,
            "img"   => $val_->gambar,
            "name"  => $val_->nama_situs,
            "kategori_" => "cagar_budaya"
        ];
        array_push($_list, $ls);
    }


    $data = [
        "getAllWsata" => \App\Models\Wisata::orderBy('created_at', 'DESC')->paginate(5),
        "wis_bud"   => $_list,
        "mapWisata" => json_encode($mapWisata),
    ];
    return view('index', $data);
});


Route::get('/getWisata', function () {
    $data = [
        "wisata" => \App\Models\Wisata::orderBy('created_at', 'DESC')->paginate(6)
    ];
    return view('getWisata', $data);
});

Route::get('/detailWisata/{slug}/{slug1?}', function ($id, $slug = null) {
    $data = [
        "wisata" => \App\Models\Wisata::whereid($id)->first(),
        "id" => $id,
        "id_coment" => $slug
    ];
    return view('detailWisata', $data);
});

Route::get('/getBudaya', function () {
    $data = [
        "budaya" => \App\Models\Budaya::orderBy('created_at', 'DESC')->paginate(6)
    ];
    return view('getBudaya', $data);
});

Route::get('/getDetailBudaya/{slug}', function ($id) {
    $data = [
        "budaya" => \App\Models\Budaya::whereid($id)->first()
    ];
    return view('detailBudaya', $data);
});

Route::get('/getCagarBudaya', function () {
    $data = [
        "cagar" => \App\Models\CagarBudaya::orderBy('created_at', 'DESC')->paginate(6)
    ];
    return view('getCagarBudaya', $data);
});

Route::get('/getDetailCagar/{slug}', function ($id) {
    $data = [
        "Cagar" => \App\Models\CagarBudaya::whereid($id)->first()
    ];
    return view('detailCagar', $data);
});


Route::post('/getDesa', function (Request $req) {
    $desa = \App\Models\Desa::whereidKec($req->id)->get();
    return json_encode($desa);
});


Route::get('/tentang', [
    App\Http\Controllers\TentangController::class, 'public_tentang'
]);

Route::get('/produk_kami', [
    \App\Http\Controllers\ProdukController::class, 'getAllProduk',
]);

Route::get('getDetail/{slug?}', [
    \App\Http\Controllers\ProdukController::class, 'get_data_produk',
]);

Route::get('/berita', [
    \App\Http\Controllers\BeritaController::class, 'publicBerita',
]);

Route::get('/getBerita/{slug?}/{slug2?}', [
    \App\Http\Controllers\BeritaController::class, 'getViewBerita',
]);

Route::get('/blog', function () {

    $data = [

        "Blogitem" => App\Models\blog::where(['status' => '1'])->orderBy('created_at', 'DESC')->paginate(5),
        "kategori" => App\Models\blog::all()->groupBy('category'),


    ];

    // dd($data['kategori']['x']->count());

    return view('blog', $data);
});

Route::get('/getBlog/{slug}', function ($sl) {

    $data = [
        "id" => $sl,
        "id_coment" => "",
        "Blogitem" => App\Models\blog::where(['status' => '1', 'id' => $sl])->first(),
        "kategori" => App\Models\blog::all()->groupBy('category'),

    ];


    $gt = $data['Blogitem']['viwer'] + 1;

    $up = App\Models\blog::where(['status' => '1', 'id' => $sl])->update(["viwer" => $gt]);

    return view('view_blog', $data);
});

Route::get('/kontak', function () {
    return view('kontak');
});

// ================================= admin page ===================

Route::get('/setWeb', [
    WebsiteController::class, 'index',
]);

Route::post('/reqDataWebsite', [
    WebsiteController::class, 'save',
]);

Route::get('/account', [
    \App\Http\Controllers\UserController::class, 'index',
]);

Route::post('/addAdmin', [
    \App\Http\Controllers\UserController::class, 'addAdmin',
]);
Route::post('/deleteAccount', [
    \App\Http\Controllers\UserController::class, 'deleteAccount',
]);
// --- page produk --

// ====================== Berita =================================
Route::get('/entry_berita/{slug?}', [
    \App\Http\Controllers\BeritaController::class, 'index',
]);

Route::get('/admgetBerita', [
    \App\Http\Controllers\BeritaController::class, 'getBerita',
]);

Route::post('/save_berita', [
    \App\Http\Controllers\BeritaController::class, 'save_berita',
]);

Route::post('/deleteBerita', [
    \App\Http\Controllers\BeritaController::class, 'deleteBerita',
]);

Route::post('/visibilityBerita', [
    \App\Http\Controllers\BeritaController::class, 'visibilityBerita',
]);



// ====================== Stop Berita ============================

// Route::get('/produk',[
//     \App\Http\Controllers\ProdukController::class, 'index',
// ]);
// Route::get('/create_produk/{slug?}', [
//     \App\Http\Controllers\ProdukController::class, 'index',
// ]);
// Route::post('/produk_proses', [
//     \App\Http\Controllers\ProdukController::class, 'produk_proses',
// ]);

// Route::get('/view_produk', [
//     \App\Http\Controllers\ProdukController::class, 'getProduk',
// ]);
// Route::get('/preview_produk/{slug}', [
//     \App\Http\Controllers\ProdukController::class, 'preview_produk',
// ]);
// Route::post('/deleteProduk', [
//     \App\Http\Controllers\ProdukController::class, 'deleteProduk',
// ]);
// ------------------


// tentang ================
Route::get('addItemProfile', [
    App\Http\Controllers\TentangController::class, 'index'
]);
Route::post('proses_data_tentang', [
    App\Http\Controllers\TentangController::class, 'proses_data_tentang'
]);
Route::post('getDataTentang', [
    App\Http\Controllers\TentangController::class, 'getDataTentang'
]);
Route::post('hapusTentang', [
    App\Http\Controllers\TentangController::class, 'hapusTentang'
]);
Route::post('visi_misi', [
    App\Http\Controllers\VisiMisiController::class, 'visi_misi'
]);

Route::post('profile_image', [
    App\Http\Controllers\VisiMisiController::class, 'profile_image'
]);



// ========================


// ======= blog ==================
Route::get('/entryBlog/{slug?}', [
    App\Http\Controllers\BlogController::class, 'entryBlog'
]);
Route::get('/admBlog', [
    App\Http\Controllers\BlogController::class, 'admBlog'
]);
Route::post('/save_blog', [
    App\Http\Controllers\BlogController::class, 'content'
]);

Route::post('/deleteBlog', [
    App\Http\Controllers\BlogController::class, 'deleteBlog'
]);

Route::post('/visibility', [
    App\Http\Controllers\BlogController::class, 'visibility'
]);
// ==========================================================

// ================ Tim =====================================
Route::get('/addTim', [
    App\Http\Controllers\TimController::class, 'addTim'
]);
Route::post('inpTim', [
    App\Http\Controllers\TimController::class, 'inpTim'
]);
Route::post('getDataTim', [
    App\Http\Controllers\TimController::class, 'getDataTim'
]);
Route::post('deleteTim', [
    App\Http\Controllers\TimController::class, 'deleteTim'
]);
// ==========================================================

// ============ kontak ======================================

Route::get('/contact', [
    App\Http\Controllers\ContactController::class, 'index'
]);
Route::post('/insContact', [
    App\Http\Controllers\ContactController::class, 'insContact'
]);

// ==========================================================

Route::get('/admPatner', [
    App\Http\Controllers\PatnerController::class, 'index'
]);
Route::post('/savepatner', [
    App\Http\Controllers\PatnerController::class, 'savepatner'
]);
Route::post('/getpatneredit', [
    App\Http\Controllers\PatnerController::class, 'getpatneredit'
]);

// ================================================================

Route::get('/test', function () {
    // var_dump(webConfig::get('title'));
    // var_dump(getIp());
    // $getData = \App\Models\kunjungan::where(["ip" => getIp(),"tgl"=>date('Y-m-d')])->get()->count();
    // $up = new \App\Models\kunjungan(["kunjungan"=>'1', "ip" => getIp(),"tgl"=>date('Y-m-d')]);
    // $up->save();
    // echo $getData;
});


/////////////////////////////////////////////////////////////////////////

Route::get('/inswisata/{slug?}', [
    App\Http\Controllers\WisataController::class, 'formWisata'
]);

Route::get('/wisata/{slug?}', [
    App\Http\Controllers\WisataController::class, 'index'
]);

Route::post('/seendWisata', [
    App\Http\Controllers\WisataController::class, 'seendWisata'
]);

Route::post('/deleteItem', [
    App\Http\Controllers\WisataController::class, 'deleteItem'
]);

Route::get('/detailItem/{slug}', [
    App\Http\Controllers\WisataController::class, 'detailItem'
]);

// ////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////

Route::get('/insbudaya/{slug?}', [
    App\Http\Controllers\BudayaController::class, 'formBudaya'
]);

Route::get('/budaya', [
    App\Http\Controllers\BudayaController::class, 'index'
]);
Route::post('/seendBudaya', [
    App\Http\Controllers\BudayaController::class, 'seendBudaya'
]);
Route::post('/deleteBudaya', [
    App\Http\Controllers\BudayaController::class, 'deleteBudaya'
]);
Route::get('/detailBudaya/{slug}', [
    App\Http\Controllers\BudayaController::class, 'detailBudaya'
]);

// ////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////

Route::get('/insCagarBudaya/{slug?}', [
    App\Http\Controllers\CagarBudayaController::class, 'formCagar'
]);

Route::post('/seendCagar', [
    App\Http\Controllers\CagarBudayaController::class, 'seendCagar'
]);

Route::get('/cagarBudaya', [
    App\Http\Controllers\CagarBudayaController::class, 'index'
]);

Route::post('/deleteCagar', [
    App\Http\Controllers\CagarBudayaController::class, 'deleteCagar'
]);

Route::get('/detailCagarBudaya/{slug}', [
    App\Http\Controllers\CagarBudayaController::class, 'detail'
]);

// ////////////////////////////////////////////////////////////////////

// /////////////// komenter /////////////////////////
Route::post('/Uskomentar', [
    App\Http\Controllers\CommetNewsController::class, 'commetBerita'
]);
Route::post('/UskomentarBlog', [
    App\Http\Controllers\CommentBlogController::class, 'commetBlog'
]);
Route::post('/UskomentarWisata', [
    \App\Http\Controllers\CommentWisataController::class, 'sendComent'
]);
// ///////////////////////////////////////

// ///////////// adm coment //////////
Route::get('/admcomets/{slug}/{id}', [
    \App\Http\Controllers\commentController::class, 'coment'
]);
// /////////////////////////////////
Route::post('/comntVisible/', function (Request $req) {
    // return response()->json($req->all());
    // die();
    try {
        $data = $req->all();
        $status = '1';
        if ($data['status'] == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        switch ($req['content']) {
            case 'Wisata':
                $ex = \App\Models\commentWisata::whereid($req->id)->update(["status" => $status]);
                break;
            case 'Berita':
                $ex = \App\Models\Commet_news::whereid($req->id)->update(["status" => $status]);
                break;
            case 'Blog':
                $ex = \App\Models\commentBlog::whereid($req->id)->update(["status" => $status]);
                break;

            default:
                # code...
                break;
        }
        if ($ex) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return response()->json(["status" => 500, "msg" => "gagal"]);
    }
});
// ===========================================================================


// ///////////////////////////////////////////
Route::get('/repWisata/{id?}', [
    \App\Http\Controllers\LaporanController::class, 'wisata'
]);
// //////////////////////////////////////////
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
