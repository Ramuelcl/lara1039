<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $table = 'entidades';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table
                ->string('razonSocial')
                ->nullable()
                ->default(null)
                ->charset('utf8mb4');
            $table
                ->string('titulo')
                ->nullable()
                ->default(null)
                ->charset('utf8mb4');
            $table
                ->string('nombres')
                ->nullable()
                ->default(null)
                ->charset('utf8mb4');
            $table
                ->string('apellidos')
                ->nullable()
                ->default(null)
                ->charset('utf8mb4');
            $table
                ->date('aniversario')
                ->nullable()
                ->default(null);
            $table->boolean('is_active')->default(true);
            $table
                ->boolean('sexo')
                ->nullable()
                ->default(null);
            $table->enum('tipo', ['cliente', 'vendedor', 'perfil', 'JobTime']);
            $table->timestamps();
        });

        Schema::table('emails', function (Blueprint $table) {
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades');
        });

        Schema::table('direcciones', function (Blueprint $table) {
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades');
        });

        Schema::table('telefonos', function (Blueprint $table) {
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};
