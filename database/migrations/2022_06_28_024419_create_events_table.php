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
            $table->string('title');
            $table->longText('discription');
            $table->string('image_uploader');
            $table->date('event_start');
            $table->date('event_end');
            $table->text('event_time_discription')->nullable();
            $table->string('fee');
            $table->string('official_url')->nullable();
            $table->string('venue')->nullable();
            $table->integer('zip1');
            $table->integer('zip2');
            $table->string('address1');
            $table->string('address2');
            $table->boolean('form_public')->default(false)->comment('公開・非公開');

            //外部キー設定
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->comment('ユーザID');
            $table->foreignId('category_id')->constrained('categories')->comment('カテゴリーID');
            
            // $table->foreignId('team_id')->constrained('teams')->onDelete('cascade')->comment('主催者チームID');

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
