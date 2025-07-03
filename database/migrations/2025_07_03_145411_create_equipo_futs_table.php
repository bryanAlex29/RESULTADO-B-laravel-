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
        Schema::create('equipo_futs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->required();
            $table->string('marca', 50)->required();
            $table->string('deporte', 50)->required();
            $table->string('talla', 20)->required();
            $table->string('material', 80)->required();
            $table->decimal('precio', 8, 2)->required();
            $table->unsignedInteger('stock')->required();
           $table->enum('condicion', ['nuevo', 'usado', 'reacondicionado']);
           $table->boolean('estado')->default(true); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_futs');
    }
};
