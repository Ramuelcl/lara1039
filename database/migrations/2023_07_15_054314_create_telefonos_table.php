<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $table = 'telefonos';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('entidad_id')
                ->constrained('entidades')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer('tipo'); // 1=personal, 2=trabajo, 3=otro
            $table->string('pais', 4);
            $table->string('numero', 20);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
