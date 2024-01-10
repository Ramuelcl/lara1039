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
            $table->unsignedBigInteger('entidad_id');
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades');
            $table
                ->integer('tipo')
                ->nullable()
                ->default('1'); // 1=personal, 2=trabajo, 3=otro
            $table
                ->string('cod_pais', 4)
                ->nullable()
                ->default('+33');
            $table
                ->string('numero', 20)
                ->nullable()
                ->default(null);
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
