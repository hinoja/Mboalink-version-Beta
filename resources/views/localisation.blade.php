
<!DOCTYPE html>
<html>
    <head>
    <title>Place Autocomplete With Latitude & Longitude </title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
#pac-input {
    background-color: #fff;
    padding: 0 11px 0 13px;
    width: 400px;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
}
#pac-input:focus {
    border-color: #4d90fe;
    margin-left: -1px;
    padding-left: 14px;  /* Regular padding-left + 1. */
    width: 401px;
}
}
</style>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A&libraries=places&callback=initMap">
</script>
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A"></script>
    <script>


  function initialize() {
        var address = (document.getElementById('pac-input'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
        /*********************************************************************/
        /* var address contain your autocomplete address *********************/
        /* place.geometry.location.lat() && place.geometry.location.lat() ****/
        /* will be used for current address latitude and longitude************/
        /*********************************************************************/
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('long').innerHTML = place.geometry.location.lng();
        });
  }

   google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    </head>
    <body>
<input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
<div id="lat"></div>
<div id="long"></div>
</body>
</html>


{{-- @extends('app.master')
@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />


    <style>
        /*
         * Always set the map height explicitly to define the size of the div element
         * that contains the map.
         */
        #map {
            height: 400px;
        }

        /*
         * Optional: Makes the sample page fill the window.
         */
        html,
        body {
            height: 400px;
            margin: 30;
            padding: 10;
        }
    </style>
    <div id="map"></div>

    <!--
              The `defer` attribute causes the callback to execute after the full HTML
              document has been parsed. For non-blocking uses, avoiding race conditions,
              and consistent behavior across browsers, consider loading using Promises
              with https://www.npmjs.com/package/@googlemaps/js-api-loader.
              -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A&callback=initMap&v=weekly"
        defer></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 4.061536,
                    lng: 9.786072
                },
                zoom: 5,
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: 4.061536,
                    lng: 9.786072
                },
                map: map,
            });
        }
        window.initMap = initMap;
    </script>
@endsection
@push('sweetAlert')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A&callback=initMap&v=weekly"
        defer></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }

        window.initMap = initMap;
    </script>
@endpush --}}





{{-- <!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
</head>

<body>
    <style>
        /*
     * Always set the map height explicitly to define the size of the div element
     * that contains the map.
     */
        #map {
            height: 100%;
        }

        /*
     * Optional: Makes the sample page fill the window.
     */
        html,
        body {
            height: 500px;
            margin: 0;
            padding: 0;
        }
    </style>
    <div id="map"></div>

    <!--
          The `defer` attribute causes the callback to execute after the full HTML
          document has been parsed. For non-blocking uses, avoiding race conditions,
          and consistent behavior across browsers, consider loading using Promises
          with https://www.npmjs.com/package/@googlemaps/js-api-loader.
          -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A&callback=initMap&v=weekly"
        defer></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }

        window.initMap = initMap;
    </script>
</body>

</html> --}}


{{-- GeoCOde on map but we must enable billing in map --}}
{{-- <html>

    <head>
        <title>Geocoding Service</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <link rel="stylesheet" type="text/css" href="./style.css" />
        <script type="module" src="./index.js"></script>
    </head>

    <body>
        <style>
            /*
     * Always set the map height explicitly to define the size of the div element
     * that contains the map.
     */
            #map {
                height: 100%;
            }

            /*
     * Optional: Makes the sample page fill the window.
     */
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }

            input[type=text] {
                background-color: #fff;
                border: 0;
                border-radius: 2px;
                box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
                margin: 10px;
                padding: 0 0.5em;
                font: 400 18px Roboto, Arial, sans-serif;
                overflow: hidden;
                line-height: 40px;
                margin-right: 0;
                min-width: 25%;
            }

            input[type=button] {
                background-color: #fff;
                border: 0;
                border-radius: 2px;
                box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
                margin: 10px;
                padding: 0 0.5em;
                font: 400 18px Roboto, Arial, sans-serif;
                overflow: hidden;
                height: 40px;
                cursor: pointer;
                margin-left: 5px;
            }

            input[type=button]:hover {
                background: rgb(235, 235, 235);
            }

            input[type=button].button-primary {
                background-color: #1a73e8;
                color: white;
            }

            input[type=button].button-primary:hover {
                background-color: #1765cc;
            }

            input[type=button].button-secondary {
                background-color: white;
                color: #1a73e8;
            }

            input[type=button].button-secondary:hover {
                background-color: #d2e3fc;
            }

            #response-container {
                background-color: #fff;
                border: 0;
                border-radius: 2px;
                box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
                margin: 10px;
                padding: 0 0.5em;
                font: 400 18px Roboto, Arial, sans-serif;
                overflow: hidden;
                overflow: auto;
                max-height: 50%;
                max-width: 90%;
                background-color: rgba(255, 255, 255, 0.95);
                font-size: small;
            }

            #instructions {
                background-color: #fff;
                border: 0;
                border-radius: 2px;
                box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
                margin: 10px;
                padding: 0 0.5em;
                font: 400 18px Roboto, Arial, sans-serif;
                overflow: hidden;
                padding: 1rem;
                font-size: medium;
            }
        </style>
        <div id="map"></div>

        <!--
          The `defer` attribute causes the callback to execute after the full HTML
          document has been parsed. For non-blocking uses, avoiding race conditions,
          and consistent behavior across browsers, consider loading using Promises
          with https://www.npmjs.com/package/@googlemaps/js-api-loader.
          -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_gojO3FHFAGUAgNCTsph7vLT4KZIJ_A&callback=initMap&v=weekly"
            defer></script>
        <script>
            let map;
            let marker;
            let geocoder;
            let responseDiv;
            let response;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 8,
                    center: {
                        lat: -34.397,
                        lng: 150.644
                    },
                    mapTypeControl: false,
                });
                geocoder = new google.maps.Geocoder();

                const inputText = document.createElement("input");

                inputText.type = "text";
                inputText.placeholder = "Enter a location";

                const submitButton = document.createElement("input");

                submitButton.type = "button";
                submitButton.value = "Geocode";
                submitButton.classList.add("button", "button-primary");

                const clearButton = document.createElement("input");

                clearButton.type = "button";
                clearButton.value = "Clear";
                clearButton.classList.add("button", "button-secondary");
                response = document.createElement("pre");
                response.id = "response";
                response.innerText = "";
                responseDiv = document.createElement("div");
                responseDiv.id = "response-container";
                responseDiv.appendChild(response);

                const instructionsElement = document.createElement("p");

                instructionsElement.id = "instructions";
                instructionsElement.innerHTML =
                    "<strong>Instructions</strong>: Enter an address in the textbox to geocode or click on the map to reverse geocode.";
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
                map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
                map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
                marker = new google.maps.Marker({
                    map,
                });
                map.addListener("click", (e) => {
                    geocode({
                        location: e.latLng
                    });
                });
                submitButton.addEventListener("click", () =>
                    geocode({
                        address: inputText.value
                    })
                );
                clearButton.addEventListener("click", () => {
                    clear();
                });
                clear();
            }

            function clear() {
                marker.setMap(null);
                responseDiv.style.display = "none";
            }

            function geocode(request) {
                clear();
                geocoder
                    .geocode(request)
                    .then((result) => {
                        const {
                            results
                        } = result;

                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        marker.setMap(map);
                        responseDiv.style.display = "block";
                        response.innerText = JSON.stringify(result, null, 2);
                        return results;
                    })
                    .catch((e) => {
                        alert("Geocode was not successful for the following reason: " + e);
                    });
            }

            window.initMap = initMap;
        </script>
    </body>

    </html> --}}
