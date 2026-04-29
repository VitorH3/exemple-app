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
        Schema::create('products', function (Blueprint $table) {
            // crie os campos de 
            // primeiro nome com até 30 caracteres
            // sobrenome com até 30 caracteres
            // onde o primeiro nome é requerido e o sobrenome é opcional
            $table->string('first_name')->required();
            $table->string('last_name')->nullable();

            // o campo description deve ter no máximo 255 caracteres
            $table->string('description', 255);
            // o campo price é um decimal com até 10 dígitos e 1 casas decimal
            $table->decimal('price', 10, 1);
            // o campo stock é um decimal com até 10 dígitos e 0 casas decimal
            $table->decimal('stock');

            
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
