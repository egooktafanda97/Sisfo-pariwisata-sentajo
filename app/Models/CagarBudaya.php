<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarBudaya extends Model
{
	use HasFactory;
	protected $table = 'cagar_budaya';
	protected $fillable = [
		"kecamatan",
		"alamat",
		"nama_situs",
		"perkiraan_tahun",
		"sejarah_singkat",
		"keterangan",
		"Deskripsi",
		"gambar",
		"_sts"
	];
}
