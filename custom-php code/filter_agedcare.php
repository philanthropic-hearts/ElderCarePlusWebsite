<style>
.filterDiv {
  float:left;
  background-color: white;
  color: black;
  display:none;
}

.show {
  display: block;
}

.container {
  margin-top: 20px;
  overflow: hidden;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 5px;
  margin-left:2px;
  background-color: #11026F;
  cursor: pointer;
  font-size:15px;
  font-weight:400;
  font-family: 'Roboto', sans-serif;
}

.btn:hover {
  background-color: #80abc8;
}

.btn.active {
  background-color: #80abc8;
  color: white;
}
</style>

<div class="container">
   
   <?php
	  if(isset($_POST['btnSuburb'])){
		 
		 $suburb_name = $_POST['suburb'];
		 if($_POST['suburb'] == '*'){
		   $suburb_name = 'All Suburbs';
		 } 
		
		 echo "<h2>Aged Care Services in " . $suburb_name . " </h2> </br>";
	  }	 
   
   ?>
   <h2>Filter By Care Type</h2>
   <div id="myBtnContainer">
     <button class="btn active" onclick="filterSelection('all')"> Show all</button>
	  <?php
		global $wpdb;
		$second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		
		/**
		 * Use the new database object just like you would use $wpdb
		 */

		$result = $second_db->get_results("SELECT DISTINCT `Care Type` FROM `age_care_services` ORDER BY `Care Type` ASC");
		foreach ( $result as $row ) 
		{ 
			$val = $row->{"Care Type"};
			if($val != 'Innovative Pool' & $val != 'Multi-Purpose Service') {
				echo '<button class="btn" onclick="filterSelection(\''. $val .'\')">'. $val .'</button>';
			}
		}
	  
	  ?>
   </div>
   <?php
	   if(isset($_POST['btnSuburb'])){
		 $suburb_name = $_POST['suburb'];
				 
		 global $wpdb;
		  # establishing the connection with AWS RDS (MySQL) database
		 $second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		 
		 # query for fetching the records from databse based on suburb name.
		 $qry = "SELECT * FROM `age_care_services` WHERE `Physical Address Suburb` = '" . $suburb_name . "'";
		 
		 if($suburb_name == '*')
		 {
			$qry = "SELECT * FROM `age_care_services` WHERE 1";
		 }
		 
		 $result = $second_db->get_results($qry);
		 
		 echo '<h4 id="noid"> </h4>';
		 foreach ( $result as $row ){
			echo '<div class="column">
			       <div class = "card filterDiv '. $row->{"Care Type"} .' " style="padding:0px; margin:10px; width:300px; height:350px; -webkit-box-shadow:0px 13px 16px 3px rgba(62,66,66,0.12); -moz-box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); border-radius:20px;"> 
					 <div class="card-body" style="background-color:rgb(0,0,128); width:300px; border-top-left-radius:20px; border-top-right-radius:20px;">
  					  <h4 class="card-title" style="color:white; padding: 10px;">' .$row->{"Service Name"}. '</h4> </div>
					   <div style="padding: 20px"><p class="card-text" style="">
						 <ul>
						   <li><b>Address:</b> '. $row->{"Address"} .'</li>
						   <li><b>Suburb:</b> ' . $row->{"Physical Address Suburb"} . '</li>
						   <li><b>Care Type:</b> ' . $row->{"Care Type"} . '</li>
						   <li><b>Provider Name:</b> ' . $row->{"Provider Name"} . '</li>
						   <li><b>Organisation Type:</b> ' . $row->{"Organisation Type"} . '</li>
						 </ul>
					   </p>
				      </div> 
				  </div>
                </div>';
		 }	 
	  }
	  else {
		 
		 global $wpdb;
		 # establishing the connection with AWS RDS (MySQL) database
		 $second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		 
		 $qry = "SELECT * FROM `age_care_services` WHERE 1";
		 $result = $second_db->get_results($qry);
		 
		 foreach ( $result as $row ){
			echo '<div class="column">
			       <div class = "filterDiv '. $row->{"Care Type"} .' " style="padding:0px; margin:10px; width:300px; height:350px; -webkit-box-shadow:0px 13px 16px 3px rgba(62,66,66,0.12); -moz-box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); box-shadow: 0px 13px 16px 3px rgba(62,66,66,0.12); border-radius:20px;"> 
					 <div class="card-body" style="background-color:rgb(0,0,128); width: 300px; border-top-left-radius:20px; border-top-right-radius:20px;">
  					  <h4 class="card-title" style="color:white; padding: 10px;">' .$row->{"Service Name"}. '</h4> </div>
					  <div style="padding: 20px"><p class="card-text" style="">
						 <ul>
						   <li><b>Address:</b> '. $row->{"Address"} .'</li>
						   <li><b>Suburb:</b> ' . $row->{"Physical Address Suburb"} . '</li>
						   <li><b>Care Type:</b> ' . $row->{"Care Type"} . '</li>
						   <li><b>Provider Name:</b> ' . $row->{"Provider Name"} . '</li>
						   <li><b>Organisation Type:</b> ' . $row->{"Organisation Type"} . '</li>
						 </ul>
					   </p>
				      </div> 
				  </div>
                </div>';
		 }	 
	  }
	?>
  </div>
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  var cnt = 0;
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) {
		w3AddClass(x[i], "show");
		cnt=cnt+1;
	}
  }
  
  if(cnt == 0){
	document.getElementById('noid').innerHTML = "No services of this care type found in this suburb."; 
  }
  else {
    document.getElementById('noid').innerHTML = "";
  }	  
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

