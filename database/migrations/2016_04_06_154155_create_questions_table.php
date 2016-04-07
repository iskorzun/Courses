<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->text('title');
			$table->tinyInteger('type');
			$table->timestamps();
			$table->integer('test_id')->unsigned()->index();
			$table->mediumInteger('sort')->unsigned()->index()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}