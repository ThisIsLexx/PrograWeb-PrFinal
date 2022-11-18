<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'tam',
        'precio',
    ];

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    
    // public function platillo(){ return $this->belongsTo(Platillo::class); }

}
