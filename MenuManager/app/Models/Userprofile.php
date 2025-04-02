<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    protected $table = 'users_profiles';

    protected $fillable = [
        'name',
        'avatar_image',
        'users_id',
    ];

    public function user()
    {
        return $this->belongsTo(Dish::class, 'users_id'); // Relacionamento inverso
    }
}
