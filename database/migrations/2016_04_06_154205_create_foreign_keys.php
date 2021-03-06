<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tests_results', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_test_id_foreign');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_question_id_foreign');
		});
		Schema::table('tests_results', function(Blueprint $table) {
			$table->dropForeign('tests_results_test_id_foreign');
		});
	}
}