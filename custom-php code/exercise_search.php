<div style="margin-left:25%; width:80%">
<form id="exercise_form" action="" class="search-form" method="POST" style="align:center;">
	 <?php
		global $wpdb;
		$second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		
		/**
		 * Use the new database object just like you would use $wpdb
		 */

		$result = $second_db->get_results("SELECT * FROM `tbl_health_problem` ORDER BY `problem` ASC ");
		
		echo "<select name='problem' id='problem_drp' style='width:50%;float:left; padding-top: 5px; padding-bottom:5px; padding-left:5px; border-radius:20px;' class='search-field'>";		 
				foreach ( $result as $row ) 
				{ 
				    $slug = $row->{"slug"};
					$prob = $row->{"problem"};
					echo '<option value="' . $slug . '"';
					if ($_POST['problem'] == $slug) echo "selected";
					echo '>' . $prob . '</option>';
				}
		echo "</select>";
	  ?> 
	  <button name="btnProblem" class="search-submit" style=' border-radius:20px;' onclick="changeAction()">Search</button>
	</form>
</div>

<script>
	function changeAction() {
	  val1 = "/health-safety-tips/";
	  drpdwn = document.getElementById("problem_drp");
	  opt = drpdwn.options[drpdwn.selectedIndex];
	  
	  console.log(opt.value);
	  val = val1.concat(opt.value);
	 
	  document.getElementById("exercise_form").action = val;
	}
</script>