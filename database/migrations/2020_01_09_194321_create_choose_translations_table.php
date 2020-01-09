<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChooseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choose_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('native');
            $table->string('foreign_correct');
            $table->string('foreign_1');
            $table->string('foreign_2');
            $table->string('foreign_3');
            $table->string('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choose_translations');
    }
}
