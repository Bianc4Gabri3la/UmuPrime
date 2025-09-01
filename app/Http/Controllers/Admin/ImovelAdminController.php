<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imovel;
use App\Models\ImagemImovel;
use App\Models\CaracteristicaImovel;
use Illuminate\Support\Facades\Storage;

class ImovelAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listar imóveis
     */
    public function index(Request $request)
    {
        $query = Imovel::with('imagens');

        // Filtros
        if ($request->filled('tipo_negocio')) {
            $query->where('tipo_negocio', $request->tipo_negocio);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('referencia', 'like', "%{$search}%")
                  ->orWhere('endereco', 'like', "%{$search}%");
            });
        }

        $imoveis = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.imoveis.index', compact('imoveis'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        return view('admin.imoveis.create');
    }

    /**
     * Salvar imóvel
     */
    public function store(Request $request)
    {
        $request->validate([
            'referencia' => 'required|unique:imoveis',
            'titulo' => 'required',
            'tipo_negocio' => 'required|in:aluguel,venda',
            'tipo_imovel' => 'required',
            'valor' => 'required|numeric',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imovel = Imovel::create($request->all());

        // Upload de imagens
        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $index => $imagem) {
                $path = $imagem->store('imoveis', 'public');
                ImagemImovel::create([
                    'imovel_id' => $imovel->id,
                    'caminho_imagem' => $path,
                    'ordem' => $index
                ]);
            }
        }

        // Características
        if ($request->filled('caracteristicas')) {
            $caracteristicas = explode(',', $request->caracteristicas);
            foreach ($caracteristicas as $caracteristica) {
                if (trim($caracteristica)) {
                    CaracteristicaImovel::create([
                        'imovel_id' => $imovel->id,
                        'caracteristica' => trim($caracteristica)
                    ]);
                }
            }
        }

        return redirect()->route('admin.imoveis.index')
                        ->with('success', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Exibir imóvel
     */
    public function show(string $id)
    {
        $imovel = Imovel::with(['imagens', 'caracteristicas'])->findOrFail($id);
        return view('admin.imoveis.show', compact('imovel'));
    }

    /**
     * Formulário de edição
     */
    public function edit(string $id)
    {
        $imovel = Imovel::with(['imagens', 'caracteristicas'])->findOrFail($id);
        return view('admin.imoveis.edit', compact('imovel'));
    }

    /**
     * Atualizar imóvel
     */
    public function update(Request $request, string $id)
    {
        $imovel = Imovel::findOrFail($id);

        $request->validate([
            'referencia' => 'required|unique:imoveis,referencia,' . $id,
            'titulo' => 'required',
            'tipo_negocio' => 'required|in:aluguel,venda',
            'tipo_imovel' => 'required',
            'valor' => 'required|numeric',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imovel->update($request->all());

        // Upload de novas imagens
        if ($request->hasFile('imagens')) {
            $ultimaOrdem = $imovel->imagens()->max('ordem') ?? -1;
            foreach ($request->file('imagens') as $index => $imagem) {
                $path = $imagem->store('imoveis', 'public');
                ImagemImovel::create([
                    'imovel_id' => $imovel->id,
                    'caminho_imagem' => $path,
                    'ordem' => $ultimaOrdem + $index + 1
                ]);
            }
        }

        // Atualizar características
        if ($request->has('caracteristicas')) {
            $imovel->caracteristicas()->delete();
            if ($request->filled('caracteristicas')) {
                $caracteristicas = explode(',', $request->caracteristicas);
                foreach ($caracteristicas as $caracteristica) {
                    if (trim($caracteristica)) {
                        CaracteristicaImovel::create([
                            'imovel_id' => $imovel->id,
                            'caracteristica' => trim($caracteristica)
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.imoveis.index')
                        ->with('success', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Deletar imóvel
     */
    public function destroy(string $id)
    {
        $imovel = Imovel::findOrFail($id);

        // Deletar imagens do storage
        foreach ($imovel->imagens as $imagem) {
            Storage::disk('public')->delete($imagem->caminho_imagem);
        }

        $imovel->delete();

        return redirect()->route('admin.imoveis.index')
                        ->with('success', 'Imóvel excluído com sucesso!');
    }

    /**
     * Excluir apenas uma imagem
     */
    public function deleteImage($id)
    {
        $imagem = ImagemImovel::findOrFail($id);

        if (Storage::disk('public')->exists($imagem->caminho_imagem)) {
            Storage::disk('public')->delete($imagem->caminho_imagem);
        }

        $imagem->delete();

        return back()->with('success', 'Imagem removida com sucesso!');
    }
}
