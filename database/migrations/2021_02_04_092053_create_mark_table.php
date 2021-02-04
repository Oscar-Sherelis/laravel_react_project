<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mark', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('mark')->nullable();
			$table->integer('student_id')->index('fk_mark_student_id_idx');
			$table->integer('subject_id')->index('fk_mark_subject_id_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mark');
	}

}
