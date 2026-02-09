@extends('layouts.roadside')

@section('content')
<div class="page-wrap">
    <div class="card soft-card p-4 p-md-5">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h4 class="title">Request Details for ABC Towing</h4>
                <p class="subtitle mt-2">
                    Review the request and respond before it expires.
                </p>

                <div class="summary mt-3">
                    <span><strong>Service:</strong> Towing Service</span>
                    <span class="sep">•</span>
                    <span><strong>Class:</strong> Light Duty</span>
                </div>
            </div>

            <div class="text-md-end w-100 w-md-auto">
                <div class="chip">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8v5l3 2" stroke="currentColor" stroke-width="2"/>
                        <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    <span>Time remaining:</span>
                    <small id="timer">05:00</small>
                </div>
            </div>
        </div>

        <div class="section">
            <h6>Pickup Location</h6>
            <ul class="kv">
                <li><strong>City:</strong> Los Angeles</li>
                <li><strong>State:</strong> CA</li>
                <li><strong>ZIP Code:</strong> 90001</li>
            </ul>
        </div>

        <div class="section">
            <h6>Destination Location</h6>
            <ul class="kv">
                <li><strong>City:</strong> Santa Monica</li>
                <li><strong>ZIP Code:</strong> 90401</li>
            </ul>
        </div>

        <div class="section">
            <h6>Vehicle</h6>
            <ul class="kv">
                <li>2020 Toyota Camry Sedan</li>
            </ul>
        </div>

        <div class="section">
            <h6>Offer Details</h6>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="pill">
                        <div class="k">Service Price</div>
                        <div class="v">$75.00</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="pill">
                        <div class="k">Enroute</div>
                        <div class="small">
                            Miles: <strong>6.2</strong> · Free: <strong>5</strong>
                        </div>
                        <div class="small mt-1">
                            <strong>Per-mile:</strong> $4.00 |
                            <strong>Cost:</strong> $4.80
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="pill">
                        <div class="k">Loaded</div>
                        <div class="small">
                            Miles: <strong>12.5</strong> · Free: <strong>10</strong>
                        </div>
                        <div class="small mt-1">
                            <strong>Per-mile:</strong> $5.00 |
                            <strong>Cost:</strong> $12.50
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="pill pill-success">
                        <div class="k">Quoted Price</div>
                        <div class="v" style="font-size:1.25rem;font-weight:900;">
                            $95.00
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-2">
                <p class="mb-0 fw-semibold text-secondary">
                    Your prompt response is appreciated.
                </p>
                <div class="small text-secondary fw-semibold">
                    Choose Accept or Reject below.
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <button type="button" id="acceptBtn" class="btn-accept w-100">
                        Accept
                    </button>
                    <button type="button" id="rejectBtn" class="btn-reject w-100 text-center">
                        Reject
                    </button>
                </div>

                <div id="etaSection" class="hidden mt-3">
                    <label class="fw-bold mb-1">ETA (Estimated Time of Arrival)</label>
                    <select>
                        <option>15 minutes</option>
                        <option>30 minutes</option>
                        <option>45 minutes</option>
                        <option>60 minutes</option>
                    </select>
                    <button class="btn-accept w-100 mt-3">
                        Confirm Accept
                    </button>
                </div>

                <div id="dropReasonSection" class="hidden mt-3">
                    <label class="fw-bold mb-1">Drop Reason</label>
                    <select>
                        <option>Out of Area</option>
                        <option>Equipment not Available</option>
                        <option>Inclement Weather</option>
                    </select>
                    <button class="btn-reject w-100 mt-3 text-center">
                        Submit Rejection
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
let timeRemaining = 300
const timer = document.getElementById("timer")
const acceptBtn = document.getElementById("acceptBtn")
const rejectBtn = document.getElementById("rejectBtn")
const etaSection = document.getElementById("etaSection")
const dropReasonSection = document.getElementById("dropReasonSection")

const countdown = setInterval(()=>{
    let m = Math.floor(timeRemaining / 60)
    let s = timeRemaining % 60
    timer.textContent = `${m}:${s < 10 ? "0"+s : s}`
    timeRemaining--
    if(timeRemaining < 0){
        clearInterval(countdown)
        timer.textContent = "Expired"
        acceptBtn.disabled = true
        rejectBtn.disabled = true
    }
},1000)

acceptBtn.onclick = ()=>{
    etaSection.classList.remove("hidden")
    dropReasonSection.classList.add("hidden")
}

rejectBtn.onclick = ()=>{
    dropReasonSection.classList.remove("hidden")
    etaSection.classList.add("hidden")
}
</script>
@endsection
