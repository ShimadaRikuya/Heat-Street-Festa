<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->comment('ユーザーID'); // 外部キー参照
            $table->foreignId('team_id')->nullable()->constrained('teams')->onDelete('cascade')->comment('主催者チームID'); // 外部キー参照
            $table->unique(['user_id', 'team_id'],'uq_roles'); //Laravelは複合主キーが扱いにくいのでユニークで代用

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_user');
    }
}
