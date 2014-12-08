<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



/* 
------------------------------------------------------------
    BEGIN routes ues for testing
------------------------------------------------------------
*/

# Find out what environment is running
Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();
});


# Trigger error for debug testing
Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;
});


# Return environment database names
Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);
});

/* 
------------------------------------------------------------
    END routes used for testing
------------------------------------------------------------
*/



/* 
------------------------------------------------------------
    BEGIN debugging information
------------------------------------------------------------
*/

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

/* 
------------------------------------------------------------
    END debugging information
------------------------------------------------------------
*/



/* 
------------------------------------------------------------
    BEGIN practice CRUD
------------------------------------------------------------
*/

# Practice route to CREATE and save a record in table
# !!! This will not work with joins, look at route "/practice-create2" !!!
Route::get('/practice-create', function() {
    
    # Product model, ORM object
    $product = new Product();
        $product->item = 'fish';
        $product->company_id = 1;
        $product->purchase_date = 2014-11-07; // need date format validation
        $product->cost = 1234.56;
        $product->units = 54321.9876;
    $product->save();

    # Company model, ORM object
    $company = new Company(); 
        $company->name = 'fishes r us';
        $company->phone = '704-347-1747';
        $company->street = '2417 N Tryon St.';
        $company->city = 'Charlotte';
        $company->state = 'NC';
        $company->zip = 28215;
    $company->save();

    return 'The request has been sent';
});

# Practice route to CREATE with JOIN and save a record in table
Route::get('/practice-create2', function() {
    $company = new Company();
        $company->name = 'Kwik Trip';
        $company->phone = '704-347-1747';
        $company->street = '123 Statesville Ave.';
        $company->city = 'Charlotte';
        $company->state = 'NC';
        $company->zip = 28206;
    $company->save();

    $product = new Product();
        $product->item = 'crackers';
        $product->purchase_date = 2014-11-01; // need date format validation
        $product->cost = 123.50;
        $product->units = 54;
        $product->company_id = $company->id; // !!! required to create and join !!!
    $product->save();
});




# Practice route to READ records in table
Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $products = Product::all();

    # Make sure we have results before trying to print them...
    if($products->isEmpty() != TRUE) {

        # Prints all purchase dates from products table
        foreach($products as $product) {
            echo $product->purchase_date.'<br>';
            echo $product->item.'<br>';
        }
    }    
    else {
        return 'Nothing found';
    }
});




# Practice route to UPDATE records in table
Route::get('/practice-updating', function() {

    # First get a company to update
    $product = Product::where('item', 'LIKE', '%fish%')->first();

    # If we found the item, update it
    if($product) {

        # Give it a different item name
        $product->item = 'shark';

        # Save the changes
        $product->save();

        return 'Update complete; check the database to see if your update worked...';
    }
    else {
        return 'Record not found, can not update.';
    }

});




# Practice route to DELETE records in table
Route::get('/practice-deleting', function() {

    # First get a product to delete
    $product = Product::where('item', 'LIKE', '%Shark%')->first();

    # If we found the item, delete it
    if($product) {

        # Delete item record from products table
        $product->delete();

        return "Deletion complete; check the database to see if it worked...";
    }
    else {
        return "Can't delete - Item not found.";
    }

});

/* 
------------------------------------------------------------
    END practice CRUD
------------------------------------------------------------
*/



/* 
------------------------------------------------------------
    BEGIN eager load all route
------------------------------------------------------------
*/

Route::get('/eager', function() {

    /* query works, but has n+1 query issue
    $products = Product::all();   
    */       

    // Eager loading to prevent n+1 query issue
    $products = Product::with('company')->get();

    foreach($products as $product) {
        echo $product->item."<br>";
        echo $product->company->name;
        echo "<br><br>";
    }

});

/* 
------------------------------------------------------------
    END eager load all route
------------------------------------------------------------
*/



/* 
------------------------------------------------------------
    BEGIN form to create item
------------------------------------------------------------
*/

# Display the form to CREATE a new ITEM
Route::get('/add', function() {
    return View::make('add');
});

# Process the form to CREATE a new ITEM
Route::post ('/add', array ('before'=>'csrf', 

    function() {

        var_dump ($_POST);

        $product = new Product();
        $product->item = $_POST['item'];
        $product->save();

        //return 'Your item was entered';
        return Redirect::to('/practice-reading');
    }

));

/* 
------------------------------------------------------------
    END form to create item    
------------------------------------------------------------
*/



/* 
------------------------------------------------------------
    BEGIN form to signup, login, logout user    
------------------------------------------------------------
*/

# Signup GET
Route::get('/signup',
    array (
        'before' => 'guest',    
        
        function() {
            return View::make('signup');
        }
    
    )
);




# Signup POST
Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            // Try to add the user 
            try {
                $user->save();
            }
            // Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            // Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', 'Welcome to Muddy Rocks!');

        }
    )
);




# Login GET
Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);




# Login POST
Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);




# Logout GET
Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});


/* 
------------------------------------------------------------
    END form to signup, login, logout user    
------------------------------------------------------------
*/




Route::get('/', function() {
    return View::make('hello');
});













