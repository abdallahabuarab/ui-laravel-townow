@extends('layouts.roadside')

@section('content')

<div class="container my-4">
    <div class="card request-details-card p-4 p-md-5">

        <div class="mb-3">
            <h3 class="mb-1 request-details-title">Confirm Request Details</h3>
            <h5 class="text-secondary">
                Review your choices and select priority.
            </h5>
        </div>

        <div class="p-3 p-md-4 rounded-4 mb-4 request-details-inner-card">
            <div class="row g-3">
                <div class="col-12 col-md-4 text-center">
                    <h5 class="fw-bold">Selected Service:</h5>
                    <p class="selected-request-details-text m-0">Towing Service</p>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <h5 class="fw-bold">Selected Class:</h5>
                    <p class="selected-request-details-text m-0">Light Duty</p>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <h5 class="fw-bold">Location:</h5>
                    <p class="selected-request-details-text m-0">Los Angeles, CA</p>
                </div>
            </div>
        </div>

        <form>

            <div class="mb-3">
                <label class="fw-bold mb-2">Location Type <span class="text-danger">*</span></label>
                <select class="form-control selector" required>
                    <option selected disabled> Select a Location Type </option>
                    <option>Home</option>
                    <option>Highway</option>
                    <option>Parking Lot</option>
                    <option>Street</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="fw-bold mb-2">Priority</label>
                <select class="form-control selector">
                    <option selected disabled> Select Priority </option>
                    <option>Low</option>
                    <option>Normal</option>
                    <option>High</option>
                </select>
            </div>

            <button type="button" class="btn btn-blue btn-pill w-100 mt-2">
                Submit Request
            </button>

            <div class="d-flex justify-content-between mt-3">
                <a class="text-decoration-none fw-bold" href="/roadside/location">
                    ← Back
                </a>
                <a class="text-decoration-none fw-bold text-danger" href="/roadside">
                    Start Over
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
