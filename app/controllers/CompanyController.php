<?php
class CompanyController extends \BaseController {
	



	/**
	*
	*/
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('auth'); //authenicated user access
	}








	/**
	* Display 
	* @return View
	*/
	public function getIndex() {
		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');
		$query  = Input::get('query');
		$companies = Company::search($query);
			return View::make('company_index')
				->with('companies', $companies)
				->with('query', $query);
	}


	/**
	* Process the search form
	* @return View
	*/
	public function getSearch() {
		return View::make('company_search');
	}








	/**
	* Show the "Add" form
	* @return View
	*/
	public function getCreate() {

    	return View::make('company_add');	
    }


	/**
	* Process "Add" form
	* @return Redirect
	*/
	public function postCreate() {

		///// START Form validation /////
		# Define rules	
		$rules = array (
			'phone' 	=>	'numeric|digits:10', // no dashes
			'zip' 		=>	'numeric|digits:5'
		);

		# Run rules through the validator
		$validator = Validator::make(Input::all(), $rules);

		# Validation feedback
		if($validator->fails()) {
		    return Redirect::to('/company/create')
			  ->with('flash_message', 'Failed; please try again.')
			  ->withInput()
			  ->withErrors($validator);
		
		} 
		///// END Form validation /////

		$company = new Company();
		$company->fill(Input::all());
		$company->save();
		$company->save(); // Eloquent
		
		return Redirect::action('CompanyController@getIndex')
		 ->with('flash_message','The company has been added.');
	}
	







	/**
	* Show the "Edit" form
	* @return View
	*/
	public function getEdit($id) {
		try {
		    $company = Company::findOrFail($id);
		}
		
		catch(exception $e) {
		    return Redirect::to('/company')->with('flash_message', 'Not found');
		}
    
	    return View::make('company_edit')
	     ->with('company', $company);
	}


	/**
	* Process the "Edit" form
	* @return Redirect
	*/
	public function postEdit() {
		
		///// START Form validation /////
		# Define rules	
		$rules = array (
			'phone' 	=>	'numeric|digits:10', // no dashes
			'zip' 		=>	'numeric|digits:5'
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
	        $company = Company::findOrFail(Input::get('id'));
	    }

	    catch(exception $e) {
	        return Redirect::to('/company')
	         ->with('flash_message', 'Not found');
	    }
	    
	    $company->fill(Input::all()); // Laravel: mass-assignment
	    $company->save();
	   	
	   	return Redirect::action('CompanyController@getIndex')
	   	  ->with('flash_message','The changes have been saved.');
	}








	/**
	* Process deletion
	*
	* @return Redirect
	*/
	public function postDelete() {
		try {
	        $company = Company::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/company/')->with('flash_message', 'Could not delete - not found.');
	    }
	    Company::destroy(Input::get('id'));
	    return Redirect::to('/company/')->with('flash_message', 'Deleted.');
	}

}