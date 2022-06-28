<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('discription');
            $table->string('image_uploader');
            $table->date('event_start');
            $table->date('event_end');
            $table->text('event_time_discription');
            $table->string('fee');
            $table->string('official_url');
            $table->string('venue');
            $table->integer('venue_address');
            $table->integer('city');
            $table->string('address1');
            $table->boolean('form_public');

            //外部キー設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('ユーザID');
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade')->comment('主催者チームID');
            $table->foreignId('category_id')->constrained('categories')->comment('カテゴリーID');

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
        Schema::dropIfExists('events');
    }
}
