<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsResultsTable extends Migration {

	public function up()
	{
		Schema::create('tests_results', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('test_id')->unsigned();
			$table->integer('result');
		});
	}

	public function down()
	{
		Schema::drop('tests_results');
	}
}