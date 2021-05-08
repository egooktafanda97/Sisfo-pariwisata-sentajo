<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
	use HasFactory;
	protected $table = 'budaya';
	protected $fillable = [
		"nama_budaya",
		"sejarah_singkat",
		"alamat_asal",
		"kecamatan",
		"gambar",
		"vidio",
		"deskripsi",
		"status_pelestarian",
		"_sts"
	];
}
