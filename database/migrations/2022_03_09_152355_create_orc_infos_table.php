<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orc_infos', function (Blueprint $table) {
            $table->id();
            $table->string('l_number')->nullable();
            $table->string('tab_number')->nullable();
            $table->string('fio')->nullable();
            $table->string('rprs')->nullable();
            $table->string('person')->nullable();
            $table->timestamps();
        });

        Schema::table('orcs', function (Blueprint $table) {
            $table->unsignedBigInteger('orc_id')->nullable();
            $table->foreign('orc_id')
                ->references('id')
                ->on('orcs')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('orc_infos');
    }
}
