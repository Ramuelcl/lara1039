<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private $table = 'menus';

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
                ->bigInteger('parent_id')
                ->nullable()
                ->default(null);
            $table
                ->string('name', 64)
                ->charset('utf8')
                ->nullable()
                ->default(null);
            $table
                ->string('url', 64)
                ->charset('utf8')
                ->nullable()
                ->default(null);
            $table
                ->string('icon', 64)
                ->charset('utf8')
                ->nullable()
                ->default(null);
            $table
                ->boolean('is_active')
                ->nullable()
                ->default(true);
            $table
                ->boolean('vertical')
                ->nullable()
                ->default(false); // false: menu horizontal, true: menu vertical
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
};
