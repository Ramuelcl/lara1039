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

        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('nombres');
            $table->string('apellidos');
            $table->boolean('is_active')->default(true);
            $table->enum('tipo', ['cliente', 'vendedor', 'perfil', 'JobTime']);
            $table->unsignedBigInteger('email_id');
            $table
                ->foreign('email_id')
                ->references('id')
                ->on('emails')
                ->onDelete('cascade');
            $table->unsignedBigInteger('direccion_id');
            $table
                ->foreign('direccion_id')
                ->references('id')
                ->on('direcciones')
                ->onDelete('cascade');
            $table->unsignedBigInteger('telefono_id');
            $table
                ->foreign('telefono_id')
                ->references('id')
                ->on('telefonos')
                ->onDelete('cascade');
            $table->timestamps();
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
