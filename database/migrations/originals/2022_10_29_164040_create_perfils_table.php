<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    protected $table = 'perfiles';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create($this->table, function (Blueprint $table) {
            $table
                ->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->primary();
            $table->unsignedTinyInteger('edad');
            $table
                ->unsignedTinyInteger('id_profesion')
                ->nullable()
                ->default(null);
            $table
                ->longText('biografia')
                ->default(null)
                ->charset('utf8');
            $table
                ->string('website', 128)
                ->default(null)
                ->charset('utf8');
            $table->softDeletes();
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
