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
            $table->string('title', 50)->comment('イベント名');
            $table->string('discription', 255)->comment('イベント概要');
            $table->string('image_uploader')->comment('イベント画像');
            $table->date('event_start')->comment('開始日');
            $table->date('event_end')->comment('終了日');
            $table->text('event_time_discription')->nullable()->comment('開催日時の詳細');
            $table->integer('fee')->unsigned()->nullable()->comment('料金');
            $table->string('official_url')->nullable()->comment('公式サイトURL');
            $table->string('venue', 50)->nullable()->comment('会場名');
            $table->string('zip', 8)->comment('郵便番号');
            $table->string('address1', 50)->comment('都道府県');
            $table->string('address2', 50)->comment('市区町村');
            $table->boolean('form_public')->default(false)->comment('公開・非公開');

            //外部キー設定
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
