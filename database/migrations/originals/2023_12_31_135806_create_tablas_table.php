<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->bigInteger('tab_tabla');
            $table->bigInteger('tab_id');
            $table->string('tab_nombre', 45)->charset('utf8');
            $table
                ->string('tab_descripcion', 128)
                ->nullable()
                ->default(null)
                ->charset('utf8');
            $table
                ->boolean('is_active')
                ->nullable()
                ->default(true);
            $table
                ->enum('tab_tipoValor', ['integer', 'bigInteger', 'float', 'double', 'decimal', 'string', 'text', 'date', 'datetime', 'boolean', 'enum'])
                ->nullable()
                ->default(null);
            $table
                ->string('tab_valor1', 256)
                ->nullable()
                ->default(null)
                ->charset('utf8');
            $table
                ->string('tab_valor2', 256)
                ->nullable()
                ->default(null)
                ->charset('utf8');

            $table->softDeletes();
            $table->primary(['tab_tabla', 'tab_id']);
            $table->index('tab_nombre');
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
