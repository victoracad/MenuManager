<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Systemevent extends Model
{
    protected $table = 'system_events';

    protected $fillable = [
        'typechange',
        'tablechange',
        'update_info',
        'users_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
