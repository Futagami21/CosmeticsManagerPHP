<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_tokens', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('user_id')->index('user_id')->comment('ユーザのID');
			$table->string('token', 50)->unique('UNIQUE')->comment('トークン');
			$table->dateTime('expire_at')->nullable()->comment('トークンの有効期限');
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
		Schema::drop('user_tokens');
	}

}
