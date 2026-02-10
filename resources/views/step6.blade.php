@extends('layouts.roadside')

@section('content')
<div class="container my-4">
    <div class="card request-details-card p-4 p-md-5">

        <div class="mb-3">
            <h3 class="mb-1 request-details-title">Enter Destination & Vehicle Details</h3>
            <h5 class="text-secondary">
                Fill in the details below to continue your request.
            </h5>
        </div>

        <form id="destinationVehicleForm">

            <div class="mt-3">
                <h5 class="section-title mb-2">Destination Information</h5>

                <div class="mt-3">
                    <label class="fw-bold">Location Description <span class="text-danger">*</span></label>
                    <select id="destinationLocationType" class="form-control selector">
                        <option data-type="street">Street</option>
                        <option data-type="parking lot">Parking Lot</option>
                        <option data-type="repair facility">Repair Facility</option>
                        <option data-type="dealership">Dealership</option>
                        <option data-type="storage lot">Storage Lot</option>
                    </select>
                </div>

                <div class="mt-3" id="businessNameGroup">
                    <label class="fw-bold">Business Name</label>
                    <input type="text" class="form-control field" placeholder="Example Auto Repair">
                </div>

                <div class="mt-3">
                    <label class="fw-bold">Destination Address <span class="text-danger">*</span></label>
                    <input type="text"
                           id="destination_autocomplete"
                           class="form-control field"
                           placeholder="Start typing address...">
                </div>

                <input type="hidden" id="destination_street_number">
                <input type="hidden" id="destination_route">
                <input type="hidden" id="destination_zipcode">
                <input type="hidden" id="destination_locality">
                <input type="hidden" id="destination_state">
            </div>

            <div class="mt-4">
                <h5 class="section-title mb-2">Vehicle Information</h5>

                <div class="row g-3 mt-3">
                    <div class="col-12 col-md-3">
                        <label class="fw-bold">Vehicle Year <span class="text-danger">*</span></label>
                        <input type="number" class="form-control field" value="2020">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="fw-bold">Vehicle Make <span class="text-danger">*</span></label>
                        <input type="text" class="form-control field" value="Toyota">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="fw-bold">Vehicle Model <span class="text-danger">*</span></label>
                        <input type="text" class="form-control field" value="Camry">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="fw-bold">License Plate Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control field" value="7ABC123">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="fw-bold">Vehicle Color</label>
                        <input type="text" class="form-control field" value="Black">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="fw-bold">Vehicle Style</label>
                        <input type="text" class="form-control field" value="Sedan">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="fw-bold">VIN</label>
                        <input type="text" class="form-control field" value="1HGCM82633A004352">
                    </div>

                    
                </div>
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-blue btn-pill w-100">
                    Submit Vehicle Details
                </button>
                <div class="text-center small text-secondary fw-semibold mt-2">
                    Button will disable after click to prevent duplicates.
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.destination-select').select2({
        theme: 'bootstrap-5',
        placeholder: 'Select communication methods',
        allowClear: true,
        closeOnSelect: false
    });
});

const locationTypeSelect = document.getElementById('destinationLocationType')
const businessNameGroup = document.getElementById('businessNameGroup')
const triggerTypes = ['parking lot','repair facility','dealership','storage lot']

function toggleBusinessName(){
    const type = locationTypeSelect.options[locationTypeSelect.selectedIndex].dataset.type
    businessNameGroup.style.display = triggerTypes.includes(type) ? 'block' : 'none'
}

locationTypeSelect.addEventListener('change', toggleBusinessName)
toggleBusinessName()

document.getElementById('destinationVehicleForm').addEventListener('submit', function(){
    const btn = this.querySelector('button')
    if(btn) btn.disabled = true
})

function initAutocomplete(){
    const input = document.getElementById('destination_autocomplete')
    if(!input) return

    const autocomplete = new google.maps.places.Autocomplete(input,{
        types:['geocode'],
        componentRestrictions:{country:['us']}
    })

    autocomplete.addListener('place_changed',()=>{
        const place = autocomplete.getPlace()
        if(!place || !place.address_components) return

        let street='',route='',zip='',city='',state=''

        place.address_components.forEach(c=>{
            const t=c.types
            if(t.includes('street_number')) street=c.long_name
            if(t.includes('route')) route=c.long_name
            if(t.includes('postal_code')) zip=c.long_name
            if(t.includes('locality')) city=c.long_name
            if(t.includes('administrative_area_level_1')) state=c.short_name
        })

        document.getElementById('destination_street_number').value = street
        document.getElementById('destination_route').value = route
        document.getElementById('destination_zipcode').value = zip
        document.getElementById('destination_locality').value = city
        document.getElementById('destination_state').value = state
    })
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsk5RExl2Xr7w2BayGTYdsePr2v6WBjmo&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
