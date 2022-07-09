<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatyas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('ガチャ名称');
            $table->text('discription')->nullable()->comment('説明');

            //外部キー設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('ユーザID');

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
        Schema::dropIfExists('gatyas');
    }
}
