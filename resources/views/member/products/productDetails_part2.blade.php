
<!-- block category -->
<div class="block left-module">
	<div class="contactmaps">

<?php
//echo"<pre>";
//print_r($this->resdelivery);
$pid = $resdelivery->id;
$vid = $resdelivery->vendor_uid;
$admin_model_obj = new \App\Models\AdminImpFunctionModel;
?>
			
			
			


<?php if (!empty($resdelivery->pickUp)) {
	$mypckadr = $admin_model_obj->get_all_vendor_address($vid);
	
	if (!empty($mypckadr)) {
	$MYADDRESS = $mypckadr->loc_address;
	} else {
	$MYADDRESS = 'No Address';
	}
	} else {
	$MYADDRESS = 'No Address';
	}
?>
<script>
$(document).ready(function () {
$('.srchloc').click(function () {
$('.contactmaps form').css('display', 'none');
});
</script>










<form onsubmit="return codeAddress()">
	<label for="zip">Pick Address: </label>
	<input type="text" id="address" value="<?php echo $MYADDRESS; ?>"
	placeholder="12345" autofocus>
	</input>
	<input type="button" class="srchloc" value="Get Location >>>"
	onclick="codeAddress();">
	</input>
</form>









			                                
<div id="map" style="width:200px; height:200px;"></div>
<div id="text"></div>
<script type="text/javascript">
_uacct = "UA-162157-1";
urchinTracker();
</script>


<ul class="delivery">
	<?php if (!empty($resdelivery->pickUp)) { ?>
	<li>
		<!--  <div class="delivery-detail">
				<p><b>Pickup Address</b></p>
			<?php //$pickuplocation = $admin_model_obj->get_pickup_location($vid, $pid);
			//$store = $pickuplocation[0]['store'];
			// $picaddress = $pickuplocation[0]['address'];
			//if(!empty($store)){
			// $pickuplocationadd = $admin_model_obj->get_vendor_address($vid, $store);
			                                            /*echo "<pre>";
				                                                print_r($pickuplocationadd);*/
				?>
				<i class="fa fa-map-marker"></i> <?php //echo $pickuplocationadd[0]['loc_address']; ?>
				<?php //} else if(!empty($picaddress)){
				                                            /*echo "<pre>";
					                                                print_r($pickuplocationadd);*/
					?>
					<i class="fa fa-map-marker"></i> <?php //echo $picaddress; ?>
					<?php //} ?>
				</div> -->
	</li>
<?php } ?>




<?php if (!empty($resdelivery->byappointment)) { ?>
<li>
	<div class="delivery-detail">
		<p><b>By Appointment</b></p>
		<?php $byappointaddress = $admin_model_obj->get_byappoint_detail($pid, $vid);
		foreach ($byappointaddress as $byapp) {
		$store = $byapp->store;
		?>
		<i class="fa fa-map-marker"></i> Start Date => <?php echo $byapp->startdate; ?> End Date => <?php echo $byapp->enddate; ?>
		<?php $byapointstoreadd = $admin_model_obj->get_vendor_address($vid, $store); ?>
		Address => <?php echo $byapointstoreadd->loc_address; ?>
		<?php } ?>
	</div>
</li>
<?php } ?>



<li>
	<div class="delivery-detail">
		<p></b>Shipping Address</b></p>
		<?php $shippinglocationadd = $admin_model_obj->get_shipp_address($pid);
		foreach ($shippinglocationadd as $shipp) {
		$country_key = $shipp->country_key;
		$country_name = $admin_model_obj->get_country($country_key);
		$state_key = $shipp->state_key;
		$state_name = $admin_model_obj->get_state($state_key);
		$city_key = $shipp->city_key;
		$city_name = $admin_model_obj->get_city($city_key);
		$zipcode = $shipp->zipcode; ?>
		<i class="fa fa-map-marker"></i> <?php echo $country_name->name; ?>, &nbsp;
		<?= @$state_name->statename ?>
		, &nbsp;
		<?= @$city_name->name; ?>
		, &nbsp; (
		<?= $zipcode ?>
		)
		<?php ?>
	</div>
</li>
<?php } ?>
		                                

</ul>
</div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP1-bK_V-tjAXoUSJgOKq7dqbYvw5nsRc&v=3.exp&sensor=false&libraries=places"></script>
<script>
                                    var geocoder;
                                    var map;
                                    var infowindow;
                                    var markers = [];
                                    function initialize() {
                                        geocoder = new google.maps.Geocoder();
                                        var loca = new google.maps.LatLng(41.7475, -74.0872);
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                                            center: loca,
                                            zoom: 18
                                        });
                                    }
                                    function callback(results, status) {
                                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                                            for (var i = 0; i < markers.length; i++) {
                                                var marker = markers.pop();
                                                marker.setMap(null);
                                                delete (marker);
                                            }
                                            for (var i = 0; i < results.length; i++) {
                                                createMarker(results[i]);
                                            }
                                        }
                                    }
                                    function createMarker(place) {
                                        var placeLoc = place.geometry.location;
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: place.geometry.location
                                        });
                                        markers.push(marker);
                                        google.maps.event.addListener(marker, 'mouseover', function () {
                                            infowindow.setContent(place.name);
                                            infowindow.open(map, this);
                                        });
                                    }
                                    function codeAddress(addressvalue, phno) {
                                        $('.contactmaps form').css('display', 'none');
                                        var displayaddress = 0;
                                        if (addressvalue) {
                                            var address = addressvalue;
                                            displayaddress = 1;
                                        } else {
                                            var address = '3070 W Post Rd #105 Las Vegas, NV 89118 USA';
                                        }
                                        if (phno) {
                                            var phone_no = phno;
                                        } else {
                                            var phone_no = '702 799 9321';
                                        }
                                        if (displayaddress == 1) {
                                            $('.addressdetails').css('display', 'block');
                                            $('.address_val').html(address);
                                            $('.phone_val').html(phone_no);
                                        }
                                        geocoder.geocode({'address': address}, function (results, status) {
                                            if (status == google.maps.GeocoderStatus.OK) {
                                                map.setCenter(results[0].geometry.location);
                                                var marker = new google.maps.Marker({
                                                    map: map,
                                                    position: results[0].geometry.location
                                                });
                                                var request = {
                                                    location: results[0].geometry.location,
                                                    radius: 50000,
                                                    name: 'ski',
                                                    keyword: 'mountain',
                                                    type: ['park']
                                                };
                                                infowindow = new google.maps.InfoWindow();
                                                var service = new google.maps.places.PlacesService(map);
                                                service.nearbySearch(request, callback);
                                            } else {
                                                alert("Geocode was not successful for the following reason: " + status);
                                            }
                                        });
                                        return false;
                                    }
                                    google.maps.event.addDomListener(window, 'load', initialize);
</script>









				<?php /* if(!empty($resdelivery->delivery)){
				                                $deliverylocation = $admin_model_obj->get_delivery_location($pid);
				                                if(!empty($deliverylocation)){
				?>
				                                <div class="col-md-12 sidebar-wrapper clear-padding no-space">
					                                <div class="map sidebar-item">
						                                <h4><i class="fa fa-building-o"></i> Delivery Address</h4>
						<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
						<script src="http://maps.google.com/maps/api/js?key=AIzaSyCEMKchKO7LJz-iLILmSAuIAQZWoCJyiNE&sensor=false" type="text/javascript"></script>
						<?php foreach($deliverylocation as $delivys){
						                                $locationdata = '';
						                                $locationname = '';
						                                $Latitude  = '';
						                                $Longitude = '';
						                                $Address = '';
						                                $cuntrykey = $delivys['country'];
						                                $country_name = $admin_model_obj->get_country($cuntrykey);
						                                $statekey = $delivys['state'];
						                                $state_name = $admin_model_obj->get_state($statekey);
						                                $citykey = $delivys['city'];
						                                $city_name = $admin_model_obj->get_city($citykey);
						                                $zipcode = $delivys['postl_code'];
						                                $miles = $delivys['miles'];
						                                $countryname = urlencode($country_name[0]['name']);
						                                $stateanme = urlencode($state_name[0]['statename']);
						                                $cityname = urlencode($city_name[0]['name']);
						                                if(!empty($countryname)){
						                                $request_url = 'http://maps.googleapis.com/maps/api/geocode/xml?address='.$cityname.',+'.$stateanme.',+'.$countryname.'&sensor=true';
						                                //$resultGeoCode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$cityname.',+'.$stateanme.',+'.$countryname.'&sensor=false');
						                                $xml = simplexml_load_file($request_url) or die("url not loading");
						                                $status = $xml->status;
						                                if ($status=="OK") {
						                                $Latitude = $xml->result->geometry->location->lat;
						                                $Longitude = $xml->result->geometry->location->lng;
						                                }
						} ?>
						<?php
						                                $country = $country_name[0]['name'];
						                                $state = $state_name[0]['statename'];
						                                $city = $city_name[0]['name'];
						$del1 = $city . ', &nbsp; ' . $state . ', &nbsp; ' . $country . ', &nbsp; ' . $zipcode; ?>
						<i class="fa fa-map-marker"></i><?=$del1?></br>
						                                latitude =>
						<?php echo $Latitude; ?></br>
						longtitude => <?php echo $Longitude; ?>
						                                </br>
						<?php $locations = array();
						                                $locations[] = array(
						                                'google_map' => array(
						                                'lat' => $Latitude,
						                                'lng' => $Longitude,
						                                ),
						                                'location_address' => $del1,
						                                'location_name'    => $del1,
						                                );
						                                $map_area_lat = isset( $locations[0]['google_map']['lat'] ) ? $locations[0]['google_map']['lat'] : '';
						                                $map_area_lng = isset( $locations[0]['google_map']['lng'] ) ? $locations[0]['google_map']['lng'] : '';
						} ?>
						<script>
						                                jQuery( document ).ready( function($) {
						                                var is_touch_device = 'ontouchstart' in document.documentElement;
						                                var map = new GMaps({
						                                el: '#google-map',
						lat: '<?php echo $map_area_lat; ?>',
						lng: '<?php echo $map_area_lng; ?>',
						                                scrollwheel: false,
						                                draggable: ! is_touch_device
						                                });
						                                var bounds = [];
						<?php
						                                foreach( $locations as $location ){
						                                $name = $location['location_name'];
						                                $addr = $location['location_address'];
						                                $map_lat = $location['google_map']['lat'];
						                                $map_lng = $location['google_map']['lng'];
						?>
						var latlng = new google.maps.LatLng(<?php echo $map_lat; ?>, <?php echo $map_lng; ?>);
						                                bounds.push(latlng);
						                                map.addMarker({
						lat: <?php echo $map_lat; ?>,
						lng: <?php echo $map_lng; ?>,
						title: "<?php echo $name; ?>",
						                                infoWindow: {
						content: '<p><strong>'+"<?php echo $name; ?>"+'</strong><br />'+"<?php echo $addr; ?>"+'</p>'
						                                }
						                                });
						<?php } ?>
						                                map.fitLatLngBounds(bounds);
						                                var $window = $(window);
						                                function mapWidth() {
						                                $('.google-map').css({width: '400px', height: '300px'});
						                                }
						                                mapWidth();
						                                $(window).resize(mapWidth);
						                                });
						</script>
						                                <div id="google-map" class="google-map"></div>
					                                </div>
				                                </div>
				<?php } } */ ?>
			                        </div>