<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cosmetics', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('user_id')->index('user_id')->comment('ユーザID');
			$table->string('name', 50)->comment('化粧品の名前');
			$table->date('open_date')->nullable()->comment('開封日');
			$table->date('get_date')->nullable()->comment('入手日');
			$table->date('expiry_date')->nullable()->comment('使用期限　計算された日付');
			$table->string('expiry', 50)->nullable()->comment('使用期限');
			$table->string('image', 50)->nullable()->comment('品物画像');
			$table->string('type', 50)->nullable()->comment('化粧品の種類');
			$table->integer('favorite')->nullable()->default(0)->comment('お気に入り(通常:0 お気に入り:1)');
			$table->string('company', 50)->nullable()->comment('メーカー名');
			$table->integer('role')->nullable()->default(0)->comment('閲覧範囲(登録時:0 おすすめ登録:1)');
			$table->string('comment', 100)->nullable()->comment('コメント ');
			$table->string('memo', 100)->nullable()->comment('メモ');
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cosmetics');
	}

}
