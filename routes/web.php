<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImovelAdminController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Imóveis
Route::get('/imovel/{id}', [ImovelController::class, 'show'])->name('imovel.show');
Route::get('/imoveis-aluguel', [ImovelController::class, 'aluguel'])->name('imoveis.aluguel');
Route::get('/imoveis-venda', [ImovelController::class, 'venda'])->name('imoveis.venda');

// Páginas estáticas
Route::view('/sobre', 'sobre')->name('sobre');
Route::view('/contato', 'contato')->name('contato');

// Autenticação (sem registro público)
Auth::routes(['register' => false]);

/*
|--------------------------------------------------------------------------
| Rotas Administrativas
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('imoveis', ImovelAdminController::class);

    // Excluir imagem de um imóvel
    Route::delete('imoveis/{imovel}/imagens/{imagem}', [ImovelAdminController::class, 'deleteImage'])
        ->name('imoveis.deleteImage');
});

/*
|--------------------------------------------------------------------------
| Pós-login padrão do Laravel
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');
