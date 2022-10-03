<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //外部キー設定
            $table->foreignId('team_id')->nullable()->after('role')->constrained('teams')->onDelete('cascade')->comment('チームID');
            $table->foreignId('gatya_id')->nullable()->after('team_id')->constrained('gatyas')->onDelete('cascade')->comment('ガチャID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['team_id']);  //カラムの削除
            $table->dropForeign(['gatya_id']);  //カラムの削除
        });
    }
}
