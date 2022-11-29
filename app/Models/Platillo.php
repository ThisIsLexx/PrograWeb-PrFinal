<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;



class Platillo extends Model
{
    use HasFactory;

    public $timestamps = false;


    // Son las variables que podran ser rellenadas por el usuario.
    protected $fillable = [
        'user_id',
        'nombre_platillo',
        'tipo_platillo',
        'tam_platillo',
        'precio_platillo',
        'info_platillo',
    ];

    // Variables que no queremos se modifiquen.

    protected $guarded = [
        'id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
