<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- Creating cards for the number of services found based on the suburb selected or service name selected -->
<div class="container">
  
   <?php
	   if(isset($_POST['btnSuburb'])){
		 if ($_POST['suburb'] == '*') {
			echo "<h2>Hospitals & Health Services in Victorian Suburbs </h2> </br>";
		 }
         else {
			echo "<h2>Hospitals & Health Services in " . $_POST['suburb'] . " </h2> </br>";
		 }			 
	   }
   ?>

  <div class="card-columns">

	<?php
	  if(isset($_POST['btnSuburb'])){
		 $suburb_name = $_POST['suburb'];
		 
		 global $wpdb;
		  # establishing the connection with AWS RDS (MySQL) database
		 $second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		 
		 # query for fetching the records from databse based on suburb name.
		
		 $qry = "SELECT * FROM `tbl_hospital` WHERE `Suburb` = '" . $suburb_name . "'";
		 
		 if ($suburb_name == '*') {
		   $qry = "SELECT * FROM `tbl_hospital` WHERE 1";
		   $suburb_name = "Victorian Suburbs";
		 }
		 		
		 $result = $second_db->get_results($qry);
		 
		 foreach ( $result as $row ){
			echo '<div class = "card" style="-webkit-box-shadow:0px 13px 16px 3px rgba(62,66,66,0.12); -moz-box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); border-radius:20px;">
					<div class="card-body" style="background-color:rgb(0,0,128); border-top-left-radius:20px; border-top-right-radius:20px; padding:10px">
					  <h4 class="card-title" style="color:white">' .$row->{"Hospital Name"}. '</h4></div>
					  <div style="padding: 20px"><p class="card-text">
						 <ul>
						   <li><b>Emergency Capable:</b> ' . $row->{"Emergency Capable"} . '</li>
						   <li><b>Address:</b> '. $row->{"Location Address"} .'</li>
						   <li><b>Suburb:</b> ' . $row->{"Suburb"} . '</li>
						   <li><b>Postcode:</b> ' . $row->{"Postcode_y"} . '</li>
						   <li><b>Contact No.:</b> ' . $row->{"Telephone"} . '</li>
						   <li><b>Email:</b> ' . $row->{"Hospital Email"} . '</li>
						   <li><b>Fax:</b> ' . $row->{"Fax"} . '</li>
						   <li><b>Agency Type:</b> ' . $row->{"Agency Type"} . '</li>
						 </ul>
					  </p>
				  </div> </div> ';
		 }	 
	  }
	  else {
		 
		 global $wpdb;
		 # establishing the connection with AWS RDS (MySQL) database
		 $second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		 
		 # query for fetching the records from databse based on suburb name.
		
		 $qry = "SELECT * FROM `tbl_hospital` WHERE 1";
		 $suburb_name = "Victorian Suburbs";
		 
		 		
		 $result = $second_db->get_results($qry);
		 
		 foreach ( $result as $row ){
			echo '<div class = "card" style="-webkit-box-shadow:0px 13px 16px 3px rgba(62,66,66,0.12); -moz-box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); border-radius:20px;">
					<div class="card-body" style="background-color:rgb(0,0,128); border-top-left-radius:20px; border-top-right-radius:20px; padding:10px">
					  <h4 class="card-title" style="color:white">' .$row->{"Hospital Name"}. '</h4></div>
					  <div style="padding: 20px"><p class="card-text">
						 <ul>
						   <li><b>Emergency Capable:</b> ' . $row->{"Emergency Capable"} . '</li>
						   <li><b>Address:</b> '. $row->{"Location Address"} .'</li>
						   <li><b>Suburb:</b> ' . $row->{"Suburb"} . '</li>
						   <li><b>Postcode:</b> ' . $row->{"Postcode_y"} . '</li>
						   <li><b>Contact No.:</b> ' . $row->{"Telephone"} . '</li>
						   <li><b>Email:</b> ' . $row->{"Hospital Email"} . '</li>
						   <li><b>Fax:</b> ' . $row->{"Fax"} . '</li>
						   <li><b>Agency Type:</b> ' . $row->{"Agency Type"} . '</li>
						 </ul>
					  </p>
				  </div> </div> ';
		  }	 
	  }
	?>
  </div>
</div>
