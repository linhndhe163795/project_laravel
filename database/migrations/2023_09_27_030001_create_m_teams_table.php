<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128)->unique();
            $table->integer('ins_id');
            $table->integer('upd_id');
            $table->dateTime('ins_datetime');
            $table->dateTime('upd_datetime');
            $table->char('del_flag',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_teams');
    }
};
