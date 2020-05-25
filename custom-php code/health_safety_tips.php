<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,255,0.7);
  padding: 10px;
  border-radius:20px;
  height: 50px;
  text-align: center;
  background-color: #f1f1f1;
}

.grow { 
transition: all .2s ease-in-out; 
}

.grow:hover { 
transform: scale(1.1); 
}

.card:hover {
  background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,128,0.6));
}

#heading_id:hover {
 color:white;
}

</style>

<?php
	 global $wpdb;
	 # establishing the connection with AWS RDS (MySQL) database
	 $second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
	 
	 # query for fetching the records from database based on suburb name.

	 $qry = "SELECT * FROM `tbl_health_problem` ORDER BY `problem` ASC "; 
			
	 $result = $second_db->get_results($qry);
	 $i = 0;
	 
	 foreach ( $result as $row ){
		 
		 if ($i == 0){
			echo '<div class="row" style="padding-top:25px;">';
		 }
		 		 
		 $prob = $row->{"problem"};
		 $slug = $row->{"slug"};
		 
		 echo '<a id="anc_id" href="https://eldercareplus.tk/health-safety-tips/'. $slug .'/">';
		 echo '<div class="column grow">';
		 echo ' <div class="card" style="padding-top: 5px;">';
		 echo '   <h5 id="heading_id" style="color:black; font-size:15px;">'. $prob .'</h5>';
		 echo ' </div> </a>';
		 echo ' </div>';
		 $i=$i+1;
		 if ($i > 3){
			echo '</div>';
			$i=0;
		 }
		 
	 }

?>


