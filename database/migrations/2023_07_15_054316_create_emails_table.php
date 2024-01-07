<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
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
            $table
                ->unsignedBigInteger('entidad_id')
                ->constrained('entidades')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('email');
            $table->timestamps();
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
}
