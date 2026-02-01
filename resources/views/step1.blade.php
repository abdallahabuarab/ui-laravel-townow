@extends('layouts.roadside')
@section('content')

<div class="page-wrap">

    <div class="page-head">
        <h3>Get Help Now!</h3>
        <div class="sub">To get assistance, select the service you need from the options below
</div>
    </div>

    <div class="tile-grid">
        <label class="tile-wrap tile-selected">
            <input class="tile-input" type="radio" checked>
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M3 15h10l2-5h4v5" stroke="white" stroke-width="2"/>
                    <circle cx="7" cy="18" r="2" stroke="white" stroke-width="2"/>
                    <circle cx="18" cy="18" r="2" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Towing Service</div>
        </label>

        <label class="tile-wrap">
            <input class="tile-input" type="radio">
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M12 12c0-4 3-7 7-7" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Winch Out</div>
        </label>

        <label class="tile-wrap">
            <input class="tile-input" type="radio">
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M9 12h6" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Jump Start</div>
        </label>

        <label class="tile-wrap">
            <input class="tile-input" type="radio">
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="7" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Tire Change</div>
        </label>

        <label class="tile-wrap">
            <input class="tile-input" type="radio">
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M6 11h12v9H6z" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Unlock Service</div>
        </label>

        <label class="tile-wrap">
            <input class="tile-input" type="radio">
            <div class="service-tile">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M7 4h8v16H7z" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="tile-label">Fuel Delivery</div>
        </label>
    </div>

    <div class="mt-4" style="max-width:680px;margin:0 auto;">
        <div class="d-flex justify-content-between mb-2">
            <div style="font-weight:900">Select Class</div>
            <div class="text-secondary">Light / Medium</div>
        </div>

        <div class="class-grid">
            <label class="class-card class-selected">
                <input class="class-input" type="radio" checked>
                <span class="check-dot"></span>
                <div>
                    <p class="mb-1 fw-bold">Light Duty</p>
                    <p class="mb-0 text-secondary">Cars, small SUVs</p>
                </div>
            </label>

            <label class="class-card">
                <input class="class-input" type="radio">
                <span class="check-dot"></span>
                <div>
                    <p class="mb-1 fw-bold">Medium Duty</p>
                    <p class="mb-0 text-secondary">SUVs, vans</p>
                </div>
            </label>
        </div>

        <button class="btn btn-blue w-100 mt-3">Continue</button>
    </div>
</div>

<script>
document.addEventListener('click',e=>{
    const t=e.target.closest('.tile-wrap')
    if(t){
        document.querySelectorAll('.tile-wrap').forEach(x=>x.classList.remove('tile-selected'))
        t.classList.add('tile-selected')
    }
    const c=e.target.closest('.class-card')
    if(c){
        document.querySelectorAll('.class-card').forEach(x=>x.classList.remove('class-selected'))
        c.classList.add('class-selected')
    }
})
</script>
@endsection
