<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        'referencia', 'titulo', 'descricao', 'tipo_negocio', 'tipo_imovel',
        'valor', 'valor_condominio', 'valor_iptu', 'endereco', 'numero',
        'complemento', 'bairro', 'cidade', 'estado', 'cep', 'area_total',
        'area_construida', 'quartos', 'banheiros', 'vagas_garagem', 'suites',
        'mobiliado', 'status', 'destaque', 'latitude', 'longitude'
    ];

    protected $casts = [
        'mobiliado' => 'boolean',
        'destaque' => 'boolean',
        'valor' => 'decimal:2',
        'valor_condominio' => 'decimal:2',
        'valor_iptu' => 'decimal:2',
        'area_total' => 'decimal:2',
        'area_construida' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function imagens()
    {
        return $this->hasMany(ImagemImovel::class);
    }

    public function caracteristicas()
    {
        return $this->hasMany(CaracteristicaImovel::class);
    }

    public function getValorFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }

    public function getPrimeiraImagemAttribute()
    {
        return $this->imagens()->orderBy('ordem')->first();
    }
}
