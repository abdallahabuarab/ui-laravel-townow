@extends('layouts.roadside')

@section('title', 'TowNow - Location')

@section('content')
<div class="map-page">
    <div id="map"></div>

    <div class="map-overlay">


        <div class="overlay-title">Where is your vehicle located?</div>
        <div class="overlay-sub">Provide your exact location</div>

        <form id="locationForm" method="POST" action="">
            @csrf

            <!-- Visible only in manual mode -->
            <div id="manualBox" class="d-none text-start">
                <label class="fw-bold mb-2">Search address</label>
                <input
                    id="locationInput"
                    type="text"
                    name="locationInput"
                    class="form-control field"
                    placeholder="Type address..."
                    autocomplete="off"
                    value="{{ old('locationInput') }}"
                />

                <button type="submit" class="btn btn-blue btn-pill w-100 mt-3">
                    Continue
                </button>

                <button type="button" class="btn btn-link w-100 mt-2 fw-bold" onclick="toggleManual(false)">
                    Back
                </button>
            </div>

            <!-- Default overlay actions -->
            <div id="actionBox">
                <button type="button" class="btn btn-blue btn-pill w-100" onclick="shareLocation()">
                    Share Location
                </button>

                <div class="my-2 fw-bold text-secondary">Or</div>

                <button type="button" class="btn btn-outline-darkpill w-100" onclick="toggleManual(true)">
                    Type Address Manually
                </button>
            </div>

            <!-- Hidden fields (same IDs) -->
            <input type="hidden" id="zipCode" name="zipcode" value="">
            <input type="hidden" id="request_longitude" name="request_longitude" value="">
            <input type="hidden" id="request_latitude" name="request_latitude" value="">
            <input type="hidden" id="request_ip_country" name="request_ip_country" value="">
            <input type="hidden" id="request_ip_city" name="request_ip_city" value="">
            <input type="hidden" id="request_street_number" name="request_street_number" value="">
            <input type="hidden" id="request_route" name="request_route" value="">
            <input type="hidden" id="request_locality" name="request_locality" value="">
            <input type="hidden" id="request_state" name="request_administrative_area_level_1" value="">
        </form>

        <div class="mt-3">
            <a class="text-decoration-none fw-bold" href="">← Back</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let map, autocomplete, geocoder, marker;

    function initAutocomplete() {
        geocoder = new google.maps.Geocoder();

        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 39.5, lng: -98.35 },
            zoom: 3,
            disableDefaultUI: false,
        });

        const input = document.getElementById("locationInput");
        if (input) {
            autocomplete = new google.maps.places.Autocomplete(input, { types: ['geocode'] });
            autocomplete.addListener("place_changed", fillInFromPlace);
        }
    }

    function toggleManual(show) {
        document.getElementById('manualBox').classList.toggle('d-none', !show);
        document.getElementById('actionBox').classList.toggle('d-none', show);

        const input = document.getElementById('locationInput');
        if (input) input.required = show;
    }

    function resetHidden() {
        document.getElementById('zipCode').value = '';
        document.getElementById('request_ip_country').value = '';
        document.getElementById('request_ip_city').value = '';
        document.getElementById('request_street_number').value = '';
        document.getElementById('request_route').value = '';
        document.getElementById('request_locality').value = '';
        document.getElementById('request_state').value = '';
        document.getElementById('request_latitude').value = '';
        document.getElementById('request_longitude').value = '';
    }

    function setMarkerAndCenter(location) {
        if (marker) marker.setMap(null);
        marker = new google.maps.Marker({ map, position: location });
        map.setCenter(location);
        map.setZoom(15);
    }

    function fillInFromPlace() {
        const place = autocomplete.getPlace();
        if (!place || !place.address_components) return;

        resetHidden();

        if (place.geometry && place.geometry.location) {
            document.getElementById('request_latitude').value = place.geometry.location.lat();
            document.getElementById('request_longitude').value = place.geometry.location.lng();
            setMarkerAndCenter(place.geometry.location);
        }

        for (const component of place.address_components) {
            const types = component.types;

            if (types.includes("street_number")) document.getElementById('request_street_number').value = component.long_name;
            if (types.includes("route")) document.getElementById('request_route').value = component.long_name;

            if (types.includes("locality")) {
                document.getElementById('request_locality').value = component.long_name;
                document.getElementById('request_ip_city').value = component.long_name;
            }

            if (types.includes("administrative_area_level_1")) {
                document.getElementById('request_state').value = component.short_name || component.long_name;
            }

            if (types.includes("postal_code")) document.getElementById('zipCode').value = component.long_name;
            if (types.includes("country")) document.getElementById('request_ip_country').value = component.long_name;
        }
    }

    function shareLocation() {
        if (!navigator.geolocation) {
            alert("Your browser doesn't support geolocation.");
            return;
        }

        navigator.geolocation.getCurrentPosition((position) => {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            const latlng = { lat: parseFloat(lat), lng: parseFloat(lng) };

            resetHidden();

            document.getElementById('request_latitude').value = latlng.lat;
            document.getElementById('request_longitude').value = latlng.lng;

            setMarkerAndCenter(latlng);

            geocoder.geocode({ location: latlng }, function (results, status) {
                if (status === 'OK' && results[0]) {
                    const result = results[0];

                    const input = document.getElementById('locationInput');
                    if (input) input.value = result.formatted_address;

                    for (const component of result.address_components) {
                        const types = component.types;

                        if (types.includes("street_number")) document.getElementById('request_street_number').value = component.long_name;
                        if (types.includes("route")) document.getElementById('request_route').value = component.long_name;

                        if (types.includes("locality")) {
                            document.getElementById('request_locality').value = component.long_name;
                            document.getElementById('request_ip_city').value = component.long_name;
                        }

                        if (types.includes("administrative_area_level_1")) {
                            document.getElementById('request_state').value = component.short_name || component.long_name;
                        }

                        if (types.includes("postal_code")) document.getElementById('zipCode').value = component.long_name;
                        if (types.includes("country")) document.getElementById('request_ip_country').value = component.long_name;
                    }

                    document.getElementById('locationForm').submit();
                } else {
                    alert('Geocoder failed: ' + status);
                }
            });
        }, () => {
            alert("Geolocation service failed.");
        });
    }
</script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsk5RExl2Xr7w2BayGTYdsePr2v6WBjmo&libraries=places&callback=initAutocomplete"
  async defer></script>
@endpush
