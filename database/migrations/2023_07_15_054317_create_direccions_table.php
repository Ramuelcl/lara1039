<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $table = 'direcciones';
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
            $table->integer('tipo'); // 1=personal, 2=trabajo, 3=otro
            // $table->foreignId('entidad_id')->constrained('entidades')->cascadeOnDelete()->cascadeOnUpdate();
            $table
                ->foreignId('ciudad_id')
                ->constrained('ciudades')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->default(0);
            $table->string('direccion', 128)->charset('utf8mb4');
            $table
                ->string('codigo_postal', 6)
                ->nullable()
                ->default('0')
                ->charset('utf8mb4');
            $table
                ->string('region', 64)
                ->nullable()
                ->default(null)
                ->charset('utf8mb4');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
};
