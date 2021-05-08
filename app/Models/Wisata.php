<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $fillable = [
        "nama_wisata",
        "alamat",
        "kecamatan",
        "desa",
        "koordinat",
        "gambar",
        "vidio",
        "deskripsi",
        "status_pelestarian",
        "_sts",
    ];
}
