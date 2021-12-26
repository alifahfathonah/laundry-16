  
<div class="container" >
     
		
		
		
		<h4>Ganti lokasi Anda di map ini</h4>
		<form action="<?=$link?>/order/proses_edit" class="row form-group"  method="post">
		<div class="col-xs-6" style="padding-right:0px">
	<input required name="alamat_order" id="pac-input" class="form-control" type="text" placeholder="Cari Lokasi" value="<?=$alamat_order?>">
	</div>
    <input type="hidden" id="order_id" name="order_id" value="<?=$order_id?>">
    <input type="hidden" id="username" name="username" value="<?=$username?>">
    <input type="hidden" id="lat" name="Latitude" value="<?=$Latitude?>">
    <input type="hidden" id="lng" name="Longitude" value="<?=$Longitude?>">
	<div class="col-xs-3" style="padding-left:10px;padding-right:10px;">
	<button class=" btn btn-warning btn-block" type="reset">Reset</button>
	</div>
	<div class="col-xs-3" style="padding-left:0px">
	<button class=" btn btn-success btn-block" type="submit" name="next">Next</button>
	</div>
  </form>
	<div id="map" style="width:100%;height:250px;"></div>

      
 


</div>

 <script>
	// variabel global marker

	
      var map;
      function initAutocomplete() {
		  
		
		
		  
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?=$Latitude?>, lng: <?=$Longitude?>},
          zoom: 19,
		  mapTypeId: 'roadmap',
		  streetViewControl: false,
		  fullscreenControl: false,
		  mapTypeControl: false



        });
		
		
		  // Membuat Kotak pencarian terhubung dengan tampilan map
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
		  
        });
		
		  var marker= [];
        // Mengaktifkan detail pada suatu tempat ketika pengguna
        // memilih salah satu dari daftar prediksi tempat 
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
			
          if (places.length == 0) {
            return;
          }

          // menghilangkan marker tempat sebelumnya
          marker.forEach(function(marker) {
            marker.setMap(null);
			
          });
          marker = [];

          // Untuk setiap tempat, dapatkan icon, nama dan tempat.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            

           
            if (place.geometry.viewport) {
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
		
		
		
		var tanda;
		
		tanda = new google.maps.Marker({
			position: new google.maps.LatLng(<?=$Latitude?>, <?=$Longitude?>),
			map: map,
			
		});
		
		 // mebuat konten untuk info window
        var contentString = '<p>Erbe Laundry</p>';
		
		  // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          position: new google.maps.LatLng(-0.8608811760973081, 134.04887017361068)
        });
	

		
  
function taruhMarker(map, posisiTitik){
    
    if( tanda ){
      // pindahkan marker
      tanda.setPosition(posisiTitik);
    } else {
      // buat marker baru
      tanda = new google.maps.Marker({
        position: posisiTitik,
        map: map
		
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}  	
			
				// even listner ketika peta diklik
		  google.maps.event.addListener(map, 'click', function(event) {
			taruhMarker(this, event.latLng);
			
		  });
		  
		  
		  
		  
      }
	  
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=key&libraries=places&callback=initAutocomplete"
    async defer></script>
	
	




 
 
 
 
 
 