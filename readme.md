<h2> Live URL of the project. </h2>
<p> <a href="p4.thomasnguyen.me"> p4.thomasnguyen.me </a> <p>




<h2> Description of the project (2-3+ sentences). </h2>

<p> Project 4 was developed for a small business (seafood market) in Charlotte, NC. The application includes a process to manage inventory and contact information.</p>


<h3> Project 4 Tasks </h3>

<h4>Uses PHP/Laravel.</h4>
<p> Project 4 was developed using PHP/Laravel. Visit <a href="https://github.com/thomasnguyen704/p4"> Project 4 Github </a> to view PHP/Laravel files </p>

<h4>Uses a database with at least 2 tables. This count does not include a users table, but does include pivot tables.</h4>
<p> Project 4's database includes a "products" and "companies" table. </p>
<p> The "products" table uses the "companies" table company_id as a foregin key for the pivot table </p>
<ul> <p> Relationships: </p>
	<li> The "products" table uses the "companies" table "company_id" as a foregin key</li>
	<li> "Product" has a one-to-many (hasMany) relationship with the "Company" </li>
	<li> "Company" has an inverse one-to-many (belongsTo) relatinoship with "Products" </li>
</ul>

<h4> Demonstrates all 4 CRUD interactions (user signup/login does not count towards this). </h4>
<ul> <p> The <a href="p4.thomasnguyen.me/product"> Products </a> section has the following requirements for CRUD: </p>
	<li> <a href="p4.thomasnguyen.me/product/create"> Create </a></li>
	<li> <a href="p4.thomasnguyen.me/product"> Read </a></li>
	<li> <a href="p4.thomasnguyen.me/product/"> Update (note the "edit" link on the right side of the Products table) </a> </li>
	<li> <a href="p4.thomasnguyen.me/product/edit/1"> Delete (note that each "edit" link has a button to delete a record) </a> </li>
</ul>
<ul> <p> The <a href="p4.thomasnguyen.me/company"> Company </a> section has the following requirements for CRUD: </p>
	<li><a href="http://p4.thomasnguyen.me/company/create"> Create </a></li>
	<li><a href="http://p4.thomasnguyen.me/company/"> Read </a></li>
	<li><a href="http://p4.thomasnguyen.me/company/"> Update (note the "edit" link on the bottom of each card) </a></li>
</ul>

<h4> The project also has the following (but not limited to) functionality: </h4>
	<ul>
		<li> New user email notification </li>
		<li> Server side form validation </li>
		<li> Table sort </li>
		<li> Search </li>
		<li> Pages for 403, 404 and 500 errors </li>
		<li> Responsive mobile and desktop CSS framework (Bootstrap) </li>
		<li> Blade </li>
		<li> Eloquent </li>
	</ul>





<h2> Demo information: If you attend your section to do an in-person demo, make a note of this. If you opt to do the Jing screencast demo, include the link here. </h2>
<p> A live demo will be done during section on 12/17/2014 </p>



<h2> Any details the instructor or TA needs to know, for example, test credentials. </h2>
<p> Username: notanemail@tester007.me </p>
<p> Password: testerpassword </p>



<h2> A list of any plugins, libraries, packages or outside code used in the project. See Student Responsibilities for more details on avoiding code plagiarism. </h2>
<ul>
	<li> Boostrap - http://getbootstrap.com </li>
	<li> jQuery - http://jquery.com </li>
	<li> Mailgun - http://mailgun.com </li>
	<li> Tablesorter - http://tablesorter.com/docs </li>
</ul>


