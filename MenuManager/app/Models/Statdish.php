<?php

namespace App\Models;
use App\Models\Dish;
use Illuminate\Database\Eloquent\Model;

class Statdish extends Model
{
    protected $table = 'statdishes';

    protected $fillable = [
        'views',
        'period',
        'month',
        'dishes_id',
    ];


    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dishes_id'); // Relacionamento inverso
    }
}
