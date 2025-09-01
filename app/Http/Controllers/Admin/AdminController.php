<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imovel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalImoveis = Imovel::count();
        $imoveisAluguel = Imovel::where('tipo_negocio', 'aluguel')->count();
        $imoveisVenda = Imovel::where('tipo_negocio', 'venda')->count();
        $imoveisDestaque = Imovel::where('destaque', true)->count();
        $imoveisDisponiveis = Imovel::where('status', 'disponivel')->count();
        
        $recentesImoveis = Imovel::with('imagens')
                                ->orderBy('created_at', 'desc')
                                ->limit(5)
                                ->get();

        return view('admin.dashboard', compact(
            'totalImoveis',
            'imoveisAluguel', 
            'imoveisVenda',
            'imoveisDestaque',
            'imoveisDisponiveis',
            'recentesImoveis'
        ));
    }
}
