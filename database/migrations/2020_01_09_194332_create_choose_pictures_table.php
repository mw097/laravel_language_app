<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoosePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choose_pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foreign');
            $table->mediumText('image_correct');
            $table->mediumText('image_1');
            $table->mediumText('image_2');
            $table->mediumText('image_3');
            $table->string('language');
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
        Schema::dropIfExists('choose_pictures');
    }
}
