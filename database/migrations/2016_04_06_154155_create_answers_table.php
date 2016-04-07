<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('title');
			$table->integer('question_id')->unsigned()->index();
			$table->mediumInteger('sort')->unsigned()->index()->default('1');
			$table->integer('ball')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}