<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kunjungan extends Model
{
	use HasFactory;
	protected $table = 'kunjungan';
	protected $fillable = [
		"kunjungan",
		"ip",
		"tgl"
	];
}
