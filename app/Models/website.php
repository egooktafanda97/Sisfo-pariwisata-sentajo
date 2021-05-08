<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class website extends Model
{
    use HasFactory;
    protected $table = 'website';
    protected $fillable = [
        'web_name',
        'web_meta',
        'owner',
        'domain',
        'super_admin',
        'logo',
        'dashboard_image',
        'dashboard_title'
    ];
}
