<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    protected $table = 'tims';
    protected $fillable = [
      "nama",
      "fb",
      "wa",
      "ig",
      "tw",
      "bergabung",
      "foto"
    ];
}
