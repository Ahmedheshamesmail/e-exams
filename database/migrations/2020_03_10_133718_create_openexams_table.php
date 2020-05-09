<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenexamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openexams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subject_id');
            $table->bigInteger('level_id');
            $table->string('time');
            $table->bigInteger('work');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('openexams');
    }
}
