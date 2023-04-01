<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->id(); 
            $table->timestamps(); 

            $table->foreignId('user_id') 
                ->constrained() 
                ->onDelete('cascade'); 

            $table->foreignId('cosmetic_id') 
                ->constrained()
                ->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('likes');
	}

}
