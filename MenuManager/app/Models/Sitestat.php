<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitestat extends Model
{
    protected $table = 'sitestats';

    protected $fillable = [
        'views',
        'period',
    ];
}
