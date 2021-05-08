<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commet_news extends Model
{
    use HasFactory;
    protected $table = 'commet_news';
	protected $fillable = [
		"nama",
		"email",
		"subject",
		"post_id",
		"isi",
		"sub_comment",
		"status",
	];
}
