<?php

namespace App\Models;

use App\Models\Statdish;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';

    protected $fillable = [
        'name',
        'images',
        'description',
        'price',
        'type',
        'numMenu',
    ];

    public function statdish()
    {
        return $this->hasOne(Statdish::class, 'dishes_id'); // Relacionamento 1:1
    }
}
