<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $table = 'emails';
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
            $table->unsignedBigInteger('entidad_id');
            // $table->dropForeign('emails_entidad_id_foreign');
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades');
            $table->enum('tipo1', ['mail', 'web'])->default('mail'); // email, site web
            $table->enum('tipo2', ['personal', 'trabajo', 'otro'])->default('personal'); // personal, trabajo, otro
            $table
                ->string('nombre')
                ->nullable()
                ->default(null);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
};
