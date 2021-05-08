<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentBlog extends Model
{
    use HasFactory;
    protected $table = 'comment_blog';
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
