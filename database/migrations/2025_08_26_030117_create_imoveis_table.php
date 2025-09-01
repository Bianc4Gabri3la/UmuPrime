<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('referencia')->unique();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->enum('tipo_negocio', ['aluguel', 'venda']);
            $table->string('tipo_imovel');
            $table->decimal('valor', 12, 2);
            $table->decimal('valor_condominio', 10, 2)->nullable();
            $table->decimal('valor_iptu', 10, 2)->nullable();
            $table->string('endereco');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado', 2)->default('PR');
            $table->string('cep', 10)->nullable();
            $table->decimal('area_total', 8, 2)->nullable();
            $table->decimal('area_construida', 8, 2)->nullable();
            $table->integer('quartos')->nullable();
            $table->integer('banheiros')->nullable();
            $table->integer('vagas_garagem')->nullable();
            $table->integer('suites')->nullable();
            $table->boolean('mobiliado')->default(false);
            $table->enum('status', ['disponivel', 'vendido', 'alugado', 'indisponivel'])->default('disponivel');
            $table->boolean('destaque')->default(false);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};
