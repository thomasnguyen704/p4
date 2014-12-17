<?php

class Company extends Eloquent {
	
    # Guarded properties: SHOULD NOT be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');


	# Company has many products.
	public function product() {
		return $this->hasMany('Product');  // A company has many products (one-to-many)
    }


    /**
    * Edit: key => value
    *
    * @return Array
    */
    public static function getIdNamePair() {
        $companies = Array();
        $collection = Company::all();
        foreach($collection as $company) {
            $companies[$company->id] = $company->name;
        }
        return $companies;
    }



    /**
    * Search 
    * @return Collection
    */
    public static function search($query) {
        if($query) {
            $companies = Company::with('product') ->whereHas('product', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
        
        ->orWhere('name', 'LIKE', "%$query%") 
        
        ->get();

        }
        
        # Eager load, fetch all
        else {
            $companies = Company::with('product')->get();
        }
        
        return $companies;
    }

}