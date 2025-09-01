<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Imagem extends Model
{
    protected $table = 'imagens';
    protected $fillable = ['imovel_id', 'caminho_imagem'];
    public function imovel(){ return $this->belongsTo(Imovel::class); }
}
