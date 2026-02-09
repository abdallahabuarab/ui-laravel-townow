@extends('layouts.roadside')

@section('content')
<div class="page-wrap">
    <div class="card soft-card p-4 p-md-5">

        <div class="mb-3">
            <h2 class="page-title h4 mb-1">Enter Destination & Vehicle Details</h2>
            <div class="page-sub">
                Fill in the details below to continue your request.
            </div>
        </div>

        <form id="destinationVehicleForm">

            <div class="mt-3">
                <div class="section-title mb-2">Destination Information</div>

                <div class="mt-3">
                    <label class="label">Location Description</label>
                    <select id="destinationLocationType" class="form-control field">
                        <option data-type="street">Street</option>
                        <option data-type="parking lot">Parking Lot</option>
                        <option data-type="repair facility">Repair Facility</option>
                        <option data-type="dealership">Dealership</option>
                        <option data-type="storage lot">Storage Lot</option>
                    </select>
                </div>

                <div class="mt-3" id="businessNameGroup" style="display:none;">
                    <label class="label">Business Name</label>
                    <input type="text" class="form-control field" placeholder="Example Auto Repair">
                </div>

                <div class="mt-3">
                    <label class="label">Destination Address</label>
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
                <div class="section-title">Vehicle Information</div>

                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <label class="label">Vehicle Year</label>
                        <input type="number" class="form-control field" value="2020">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="label">Vehicle Make</label>
                        <input type="text" class="form-control field" value="Toyota">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="label">Vehicle Model</label>
                        <input type="text" class="form-control field" value="Camry">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="label">Vehicle Color</label>
                        <input type="text" class="form-control field" value="Black">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="label">Vehicle Style</label>
                        <input type="text" class="form-control field" value="Sedan">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="label">VIN</label>
                        <input type="text" class="form-control field" value="1HGCM82633A004352">
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="label">License Plate Number</label>
                        <input type="text" class="form-control field" value="7ABC123">
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
<script>
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
