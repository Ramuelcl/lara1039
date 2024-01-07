<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadEmailsTable extends Migration
{
    public $table = 'entidad_emails';

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
            $table->string('email');
            $table->timestamps();

            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades')
                ->onDelete('cascade');
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
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
    }
}
