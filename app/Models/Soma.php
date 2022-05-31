<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soma extends Model
{
    use HasFactory;

    protected $casts = [
        'valor' => 'integer',
        'valor2' => 'integer'
    ];

    protected $fillable = [
        'valor',
        'valor2',
        'nome',
        'select_day'
    ];
}