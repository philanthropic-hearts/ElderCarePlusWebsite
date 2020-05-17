<div style="margin-left:20%; width:80%">
<form action="#" class="search-form" method="POST" style="align:center;">
	 <?php
		global $wpdb;
		$second_db = new wpdb(DB_USER, DB_PASSWORD, 'eldercareplus_db', DB_HOST);
		
		/**
		 * Use the new database object just like you would use $wpdb
		 */

		$result = $second_db->get_results("SELECT DISTINCT `Suburb` FROM `tbl_hospital` ORDER BY `Suburb` ASC ");
		
		echo "<select name='suburb' id='suburb' style='width:50%;float:left; padding-top: 5px; padding-bottom:5px; border-radius:20px;' class='search-field'>";
		echo " <option value='*' > All Suburbs </option>";		 
				foreach ( $result as $row ) 
				{ 
				    $val = $row->{"Suburb"};
					echo '<option value="' . $val . '" ';	
					if ($_POST['suburb'] == $val) echo "selected";
					
					echo ' >' . $val . '</option>';
				}
		echo "</select>";
	  ?> 
	  <input type="submit" name="btnSuburb" class="search-submit" style=' border-radius:20px;'
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>
</div>
