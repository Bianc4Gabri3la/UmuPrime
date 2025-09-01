<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemImovel extends Model
{
    use HasFactory;

    protected $table = 'imagens_imoveis';

    protected $fillable = [
        'imovel_id', 'caminho_imagem', 'legenda', 'ordem'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
