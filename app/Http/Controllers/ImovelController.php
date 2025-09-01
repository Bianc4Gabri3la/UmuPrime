<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;

class ImovelController extends Controller
{
    public function show($id)
    {
        $imovel = Imovel::with(['imagens' => function($q) {
            $q->orderBy('ordem');
        }, 'caracteristicas'])->findOrFail($id);

        // Imóveis relacionados (mesmo tipo de negócio e cidade)
        $imoveisRelacionados = Imovel::with(['imagens' => function($q) {
            $q->orderBy('ordem');
        }])->where('tipo_negocio', $imovel->tipo_negocio)
          ->where('cidade', $imovel->cidade)
          ->where('id', '!=', $imovel->id)
          ->where('status', 'disponivel')
          ->limit(4)
          ->get();

        return view('imovel.show', compact('imovel', 'imoveisRelacionados'));
    }

    public function aluguel(Request $request)
    {
        return $this->listarPorTipo('aluguel', $request);
    }

    public function venda(Request $request)
    {
        return $this->listarPorTipo('venda', $request);
    }

    private function listarPorTipo($tipo, Request $request)
    {
        $query = Imovel::with(['imagens' => function($q) {
            $q->orderBy('ordem');
        }])->where('tipo_negocio', $tipo);

        // Aplicar filtros
        if ($request->filled('tipo_imovel')) {
            $query->where('tipo_imovel', 'like', '%' . $request->tipo_imovel . '%');
        }

        if ($request->filled('valor_min')) {
            $query->where('valor', '>=', $request->valor_min);
        }

        if ($request->filled('valor_max')) {
            $query->where('valor', '<=', $request->valor_max);
        }

        if ($request->filled('cidade')) {
            $query->where('cidade', 'like', '%' . $request->cidade . '%');
        }

        if ($request->filled('bairro')) {
            $query->where('bairro', 'like', '%' . $request->bairro . '%');
        }

        $query->where('status', 'disponivel');

        $imoveis = $query->orderBy('destaque', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);

        return view('imovel.lista', compact('imoveis', 'tipo'));
    }
}
