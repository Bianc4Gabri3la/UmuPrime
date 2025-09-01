<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Imovel::with(['imagens' => function($q) {
            $q->orderBy('ordem');
        }]);

        // Filtros de busca
        if ($request->filled('tipo_negocio')) {
            $query->where('tipo_negocio', $request->tipo_negocio);
        }

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

        if ($request->filled('referencia')) {
            $query->where('referencia', 'like', '%' . $request->referencia . '%');
        }

        $query->where('status', 'disponivel');

        $imoveis = $query->orderBy('destaque', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);

        $imoveisDestaque = Imovel::with(['imagens' => function($q) {
            $q->orderBy('ordem');
        }])->where('destaque', true)
          ->where('status', 'disponivel')
          ->limit(6)
          ->get();

        return view('home', compact('imoveis', 'imoveisDestaque'));
    }
}
