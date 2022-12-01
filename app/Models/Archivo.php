<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Platillo;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'ubicacion',
        'nombre_original',
        'mime',
    ];

    public function platillo(){
        return $this->belongsTo(Platillo::class);
    }
}
