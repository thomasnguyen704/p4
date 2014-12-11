<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function($table) {

	        # Increments method will make a primary key
	        $table->increments('id');

	        # Generates two columns: `created_at` and `updated_at`
	        # To keep track of changes
	        $table->timestamps();
	        
			# The rest of the fields
			$table->string('item');
			$table->integer('company_id')->unsigned(); // Foregin Key
			$table->date('purchase_date');
			$table->decimal('cost');
			$table->decimal('units');

			$table->foreign('company_id')->references('id')->on('companies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('products');
	}
}