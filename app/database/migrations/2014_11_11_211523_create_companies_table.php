<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('companies', function($table) {

	        # Increments method will make a primary key
	        $table->increments('id');

	        # Generates two columns: `created_at` and `updated_at`
	        # To keep track of changes
	        $table->timestamps();

			# The rest of the fields
			$table->string('name');
			$table->string('phone');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('companies');
	}

}