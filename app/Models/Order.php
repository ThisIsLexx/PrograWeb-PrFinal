<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Platillo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamps',
        'nombre_orden',
        'user_id',
        'fecha_orden',
        'comentario_orden',
        'cantidad_orden',
        'total_orden',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function platillos(){
        return $this->belongsToMany(Platillo::class);
    }

    public function getPrecioTotal() {
        $precio = 0;

        foreach ($this->platillos as $platillo) {
            $precio = bcadd($precio, $platillo->precio_platillo);
        }

        return $precio;
    }
}

