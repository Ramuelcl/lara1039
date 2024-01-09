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
            $table->enum('tipo1')->default('email'); // email, site web
            $table->enum('tipo2')->default('personal'); // personal, trabajo, otro
            $table->unsignedBigInteger('entidad_id');
            $table->unsignedBigInteger('email_id');
            $table->unique(['entidad_id', 'email_id']);
            $table
                ->foreign('entidad_id')
                ->references('id')
                ->on('entidades')
                ->onDelete('cascade');
            $table
                ->foreign('email_id')
                ->references('id')
                ->on('emails')
                ->onDelete('cascade');

            Schema::enableForeignKeyConstraints();
        });
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
