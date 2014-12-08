<?php

class Product extends Eloquent {

	# Guarded properties: SHOULD NOT be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

	public function company() {
		return $this->belongsTo('Company'); // Product belongs to a Company
	}



    /**
    * Search products
    * @return Collection
    */
    public static function search($query) {
        if($query) {
            $products = Product::with('company') ->whereHas('company', function($q) use($query) {
                $q->where('item', 'LIKE', "%$query%");
            })
        
        ->orWhere('item', 'LIKE', "%$query%") 
        
        ->get();

        }
        
        # Eager load, fetch all
        else {
            $products = Product::with('company')->get();
        }
        
        return $products;
    }

}