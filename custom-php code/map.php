<div style="overflow: hidden;">
<iframe scrolling="no" src="https://eldercareplus.tk/#concern" style="height:450px;">
</iframe>
</div>


<script>
$("#nutrients-container").load("https://eldercareplus.tk/health-safety-tips/arthritis/#nutrients");
</script>


AIzaSyB4iIze2d2wsL1yBYjdz6ucTvMzUJ9RbGQ




<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
	
	filterMarkers = function (category) {
		for (i = 0; i < markers1.length; i++) {
			marker = gmarkers1[i];
			// If is same category or category not picked
			if (marker.category == category || category.length === 0) {
				marker.setVisible(true);
			}
			// Categories don't match 
			else {
				marker.setVisible(false);
			}
		}
    }
	
	var mapProp= {
	  center:new google.maps.LatLng(-37.4713, 144.7852),
	  zoom:5,
	};

	var myLatLng = new google.maps.LatLng(-37.4713, 144.7852);
	var marker = new google.maps.Marker({position: myLatLng});

	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	marker.setMap(map);

}


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4iIze2d2wsL1yBYjdz6ucTvMzUJ9RbGQ&callback=myMap"></script>