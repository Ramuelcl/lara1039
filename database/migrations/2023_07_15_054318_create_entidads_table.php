<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    protected $table = 'entidades';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->string('nombres');
            $table->string('apellidos');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('email_id');
            $table->unsignedBigInteger('direccion_id');
            $table->unsignedBigInteger('telefono_id');
            $table->enum('tipo', ['cliente', 'vendedor', 'perfil']);
            $table->timestamps();

            $table
                ->foreign('email_id')
                ->references('id')
                ->on('emails')
                ->onDelete('cascade');
            $table
                ->foreign('direccion_id')
                ->references('id')
                ->on('direcciones')
                ->onDelete('cascade');
            $table
                ->foreign('telefono_id')
                ->references('id')
                ->on('telefonos')
                ->onDelete('cascade');
        });
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
}
