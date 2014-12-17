<?php
class ProductController extends \BaseController {
	



	/**
	*
	*/
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('auth'); //authenicated user access
	}








	/**
	* Display all products
	* @return View
	*/
	public function getIndex() {
		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');
		$query  = Input::get('query');
		$products = Product::search($query);
			return View::make('product_index')
				->with('products', $products)
				->with('query', $query);		
	}


	/**
	* Process the "Search" form
	* @return View
	*/
	public function getSearch() {
		return View::make('product_search');
	}








	/**
	* Show the "Add" form
	* @return View
	*/
	public function getCreate() {

		$companies = Company::getIdNamePair();
    	return View::make('product_add')->with('companies',$companies);	
    }


	/**
	* Process the "Add" form
	* @return Redirect
	*/
	public function postCreate() {

		///// START Form validation /////
		# Define rules	
		$rules = array (
			'cost' => 'numeric|min:0',
			'unit' => 'numeric|min:0',
			'purchase_date' => 'date_format:Y-m-d'
		);

		# Run rules through the validator
		$validator = Validator::make(Input::all(), $rules);

		# Validation feedback
		if($validator->fails()) {
		    return Redirect::to('/product/create')
			  ->with('flash_message', 'Failed; please try again.')
			  ->withInput()
			  ->withErrors($validator);
		
		} 
		///// END Form validation /////

		$product = new Product();
		
		$product->fill(Input::all());
		$product->save();
		
		$product->save(); // Eloquent
		
		return Redirect::action('ProductController@getIndex')
		 ->with('flash_message','The product has been added.');
	}
	







	/**
	* Show the "Edit" form
	* @return View
	*/
	public function getEdit($id) {
		try {
		    $product = Product::findOrFail($id);
		    $companies = Company::getIdNamePair();
		}
		
		catch(exception $e) {
		    return Redirect::to('/product')->with('flash_message', 'Product not found');
		}
    
	    return View::make('product_edit')
	     ->with('product', $product)
	     ->with('companies', $companies);
	}


	/**
	* Process the "Edit" form
	* @return Redirect
	*/
	public function postEdit() {
		
		///// START Form validation /////
		# Define rules	
		$rules = array (
			'cost' => 'numeric|min:0',
			'unit' => 'numeric|min:0',
			'purchase_date' => 'date_format:Y-m-d'
		);

		# Run rules through the validator
		$validator = Validator::make(Input::all(), $rules);

		# Validation feedback
		if($validator->fails()) {
		    return Redirect::to(URL::previous())
			 ->with('flash_message', 'Failed; please try again.')
			 ->withInput()
			 ->withErrors($validator);
		
		} 
		///// END Form validation /////
		

		try {
	        $product = Product::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/product')
	         ->with('flash_message', 'Product not found');
	    }
	    
	    $product->fill(Input::all()); // mass-assignment
	    $product->save();
	   	
	   	return Redirect::action('ProductController@getIndex')
	   	  ->with('flash_message','The changes have been saved.');
	}








	/**
	* Process deletion
	*
	* @return Redirect
	*/
	public function postDelete() {
		try {
	        $product = Product::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/product/')->with('flash_message', 'Could not delete - not found.');
	    }
	    Product::destroy(Input::get('id'));
	    return Redirect::to('/product/')->with('flash_message', 'Deleted.');
	}

}

