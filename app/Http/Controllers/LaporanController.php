<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use PDF;
class LaporanController extends Controller
{
    public function wisata($cari= null){
        $q = DB::table('wisata')
			->select(DB::raw('*, kecamatan.nama as nama_kec , kelurahan.nama as nama_desa'))
			->join('kecamatan', function ($join) {
				$join->on('kecamatan.id_kec', '=', 'wisata.kecamatan');
			})
			->join('kelurahan', function ($join) {
				$join->on('kelurahan.id_kel', '=', 'wisata.desa');
			})
			->where('wisata.nama_wisata', 'like', '%'.$cari.'%')
			->orWhere('kecamatan.nama', 'like', '%'.$cari.'%')
			->orWhere('kelurahan.nama', 'like', '%'.$cari.'%')
			->get();
        $d = [
            "css" => asset('Admin/plugins/bootstrap/css/bootstrap.min.css'),
            
            "wisata" => $q,
            // "imgWisata" => asset('/Images_assets/wisata/')
        ];

    	$pdf = PDF::loadview('report.wisata',$d)->setPaper('A4','portrait');
        
        return $pdf->stream();
    }
}
