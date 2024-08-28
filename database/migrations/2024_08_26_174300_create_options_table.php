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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

            $table->foreignIdFor(\App\Models\Poll::class)->constrained(); #adicionará uma coluna de chave estrangeira e também criará uma chave estrangeira
                                                        #o metodo constrained vai garantir que vai ter uma chave estrangeira no bd e a 'Option' não pode estar vazia
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
