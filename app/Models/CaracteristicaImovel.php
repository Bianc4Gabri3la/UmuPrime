<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaImovel extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas_imoveis';

    protected $fillable = [
        'imovel_id', 'caracteristica'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
