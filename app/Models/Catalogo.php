<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogo extends Model
{
    use HasFactory;

    use SoftDeletes;

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
