<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablasTable extends Migration
{
    private $table = 'tablas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create($this->table, function (Blueprint $table) {
            $table->bigInteger('tabla');
            $table->bigInteger('tabla_id');
            $table->string('nombre', 45)->charset('utf8');
            $table
                ->string('descripcion', 128)
                ->nullable()
                ->default(null)
                ->charset('utf8');
            $table
                ->boolean('activo')
                ->nullable()
                ->default(true);
            $table
                ->decimal('valor1', 8, 2)
                ->nullable()
                ->default(null);
            $table
                ->string('valor2', 128)
                ->nullable()
                ->default(null);
            $table
                ->boolean('valor3')
                ->nullable()
                ->default(false);
            $table->softDeletes();
            $table->primary(['tabla', 'tabla_id']);
            $table->index('nombre');
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
}
