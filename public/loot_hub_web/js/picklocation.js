//google.maps.event.addDomListener(window, 'load', function() {
  var maxAutoZoom = 15;
  var circle = null;
  var map;
  var minRange = 50;
  var maxRange = 50000;
  address_selected_from_google_map=false;

  function addClickListener(obj) {
    google.maps.event.addListener(obj, 'click', function(event) {      
      moveCircle(event.latLng);
      
    });
  }

  function createControls() {
    var input = document.getElementById("pac-input");
  //  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var label = document.getElementById("matchRangeLabel");
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(label);

    label.addEventListener("change", readMatchRange);
    label.addEventListener("input", readMatchRange);

    var searchBox = new google.maps.places.SearchBox(input);
    var markers = [];

    google.maps.event.addListener(searchBox, 'places_changed', function() {
																		
	address_selected_from_google_map=true;																	
																		
      var places = searchBox.getPlaces();

      for (var i = 0, marker; marker = markers[i]; i++) {
        marker.setMap(null);
      }

      // For each place, get the icon, place name, and location.
      markers = [];
      var bounds = new google.maps.LatLngBounds();
      for (var i = 0, place; place = places[i]; i++) {
        var image = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        var marker = new google.maps.Marker({
          map: map,
          icon: image,
          title: place.name,
          position: place.geometry.location
        });

        markers.push(marker);
        addClickListener(marker);

        bounds.extend(place.geometry.location);
      }

      map.fitBounds(bounds);
      if (map.getZoom() > maxAutoZoom) {
        map.setZoom(maxAutoZoom);
      }

      if (markers.length === 0) {
        removeCircle();
      } else if (markers.length === 1) {
        moveCircle(markers[0].getPosition());
      } else {
        moveCircle(map.getCenter());
      }
    });

    // Bias the SearchBox results towards places that are within the bounds of the
    // current map's viewport.
    google.maps.event.addListener(map, 'bounds_changed', function() {
      var bounds = map.getBounds();
      searchBox.setBounds(bounds);
    });
  }

  function postToParent(message) {
    if (window !== window.parent) {
      console.log("Post: " + message);
      window.parent.postMessage(message, "*");
    }
  }

  function post(position, range) {
    postToParent(JSON.stringify({
      latitude: position.lat(),
      longitude: position.lng(),
      matchRange: Math.round(range)
    }));
  }

  function removeCircle() {
    if (circle) {
      circle.setMap(null);
      postToParent("markerRemoved");
    }
  }

  function moveCircle(latLng, range) {
    if (!circle && !latLng) {
      return;
    }

    var registerEventListeners = false;
    if (!circle) {
      circle = new google.maps.Circle({
        center: latLng,
        map: map,
        strokeColor: "black",
        strokeWeight: 0.9,
        strokeOpacity: 1,
        fillColor: "#ea4345",
        clickable: false,
        fillOpacity: 0.7,
        editable: true
      });

      registerEventListeners = true; //delay registering after assigning initial values
    }

    if (latLng) {
      circle.setCenter(latLng);
      updateInputText();
    }
    if (range) {
      circle.setRadius(range);
    }

    if (registerEventListeners) {
      var listener = function() {
        range = circle.getRadius();
        if (range < minRange) {
          circle.setRadius(minRange);
          range = minRange;
        }
        if (range > maxRange) {
          circle.setRadius(maxRange);
          range = maxRange;
        }

        post(circle.getCenter(), range);
        updateInputText();
      };
      listener();

      google.maps.event.addListener(circle, 'center_changed', listener);
      google.maps.event.addListener(circle, 'radius_changed', listener);
      google.maps.event.addListener(circle, 'mouseup', listener);
    }
  }

  function readMatchRange() {
  	  var matchRange = parseInt(document.getElementById("matchRange-input").value);
	 // added by umer
    if (matchRange >= minRange && matchRange <= maxRange) {
      var lat = parseFloat(document.getElementById("latitude-input").value.replace(',','.'));
      var lng = parseFloat(document.getElementById("longitude-input").value.replace(',','.'));
      if (!isNaN(lat) && !isNaN(lng)) {
        moveCircle(new google.maps.LatLng(lat, lng), matchRange);
      }
      document.getElementById("matchRange-input").style.backgroundColor = "white";
    } else {
      document.getElementById("matchRange-input").style.backgroundColor = "#FF6363";
    }
  }
  
  function updateValueIfChanged(element, value) {
    if (element.value !== value) {
      element.value = value;
    }    
  }

  function updateInputText() {
    if (circle) {
      var matchRange = Math.round(circle.getRadius());
      if (matchRange && matchRange >= minRange) {        
        updateValueIfChanged(document.getElementById("matchRange-input"), matchRange);
      }
      var center = circle.getCenter();
      if (center) {               
        var latElement = document.getElementById("latitude-input");
        if (latElement !== document.activeElement) {
          var lat = "" + center.lat();
          if (lat.length > 10) {
            lat = "" + center.lat().toFixed(7);
          } 
          updateValueIfChanged(latElement, lat);
        }
        
        var lngElement = document.getElementById("longitude-input");
        if (lngElement !== document.activeElement) {
          var lng = "" + center.lng();
          if (lng.length > 10) {
            lng = "" + center.lng().toFixed(7);
          } 
          updateValueIfChanged(lngElement, lng);
        }
      }
    }
  }

  function init_googlemap(lat,long) {
    var mapOptions = {
      zoom: 15,
      center: new google.maps.LatLng(lat, long),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      streetViewControl: true,
      mapTypeControl: true,
      scaleControl: true,
      draggableCursor: "crosshair"
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    createControls();
    google.maps.event.addListener(map, 'click', function(event) {
      
      var activeElement = document.activeElement;
      if (document.getElementById("latitude-input") === activeElement || document.getElementById("longitude-input") === activeElement) {
        activeElement.blur();
      }
      
   	 var matchRange = parseInt(document.getElementById("matchRange-input").value);
      moveCircle(event.latLng, matchRange);
      map.panTo(event.latLng);
    });
    
    var messageHandler = function(event) {
      if (!event.origin || !event.origin.match(/(?:\.plotprojects\.com|\.plot-app\.com(?::\d+)?|localhost(?::\d+)?)$/)) {
       // return;
      }

      var data = JSON.parse(event.data);
      var latLng = new google.maps.LatLng(data.latitude, data.longitude);
      var range = data.matchRange;
      moveCircle(latLng, range);
      updateInputText();
      map.setZoom(maxAutoZoom);
      google.maps.event.trigger(map, 'resize'); //workaround for Safari putting the pin on topleft
      map.setCenter(latLng);
    };
    window.addEventListener("message", messageHandler);
    postToParent("loaded");
  }
/* init();*/
//});
