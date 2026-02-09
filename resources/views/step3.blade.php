@extends('layouts.roadside')

@section('content')
<div class="page-wrap">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="card soft-card p-4 p-md-5">

                <div class="mb-3">
                    <h4 class="fw-bold mb-1" style="font-weight:900;">Confirm Request Details</h4>
                    <div class="text-secondary fw-semibold">
                        Review your choices and select priority.
                    </div>
                </div>

                <div class="p-3 p-md-4 rounded-4 mb-4" style="background:rgba(241,245,249,.75);border:1px solid rgba(15,23,42,.08);">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="fw-bold">Selected Service</div>
                            <div class="fw-semibold">Towing Service</div>
                        </div>
                        <div class="col-12">
                            <div class="fw-bold">Selected Class</div>
                            <div class="fw-semibold">Light Duty</div>
                        </div>
                        <div class="col-12">
                            <div class="fw-bold">Location</div>
                            <div class="fw-semibold">Los Angeles, CA</div>
                        </div>
                    </div>
                </div>

                <form>

                    <div class="mb-3">
                        <label class="fw-bold mb-2">Location Type</label>
                        <select class="form-control field" required>
                            <option>Home</option>
                            <option>Highway</option>
                            <option>Parking Lot</option>
                            <option>Street</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2">Priority</label>
                        <select class="form-control field">
                            <option>Low</option>
                            <option selected>Normal</option>
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
    </div>

</div>
@endsection
