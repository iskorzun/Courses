<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	public function up()
	{
		Schema::create('tests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->smallInteger('t_category_id');
			$table->timestamps();
			$table->softDeletes();
			$table->mediumInteger('sort')->unsigned()->index()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}