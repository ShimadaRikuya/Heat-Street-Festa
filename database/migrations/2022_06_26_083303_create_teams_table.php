<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('チーム名称');
            $table->string('email')->nullable()->comment('問い合わせメールアドレス');
            $table->string('phone')->nullable()->comment('問い合わせ連絡先');
            $table->integer('owner_id')->comment('オーナーID');
            $table->integer('user_id')->comment('メンバーID');

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
        Schema::dropIfExists('teams');
    }
}
