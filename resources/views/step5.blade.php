@extends('layouts.roadside')

@section('content')





  <div class="container my-4">
    <div class="card request-details-card p-4 p-md-5">

      <!-- Title + timer -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
        <div>
          <h3 class="customer-info-title">Request Details for <span id="providerName">Premium Roadside</span></h3>
          <p class="subtitle mt-2">Review the request and respond before it expires.</p>

          <div class="summary mt-3">
            <span><strong>Service:</strong> <span id="serviceName">Tow</span></span>
            <span class="sep">•</span>
            <span><strong>Class:</strong> <span id="className">Light Duty</span></span>
          </div>
        </div>

        <div class="text-md-end w-100 w-md-auto">
          <div class="chip">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M12 8v5l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2"/>
            </svg>
            <span>Time remaining:</span>
            <small id="timer">05:00</small>
          </div>
        </div>
      </div>

      <!-- (1) Pickup Location -->
      <div class="section">
        <h6>Pickup Location</h6>
        <ul class="kv">
          <li><strong>City:</strong> <span id="pickupCity">Austin</span></li>
          <li><strong>State:</strong> <span id="pickupState">TX</span></li>
          <li><strong>ZIP Code:</strong> <span id="pickupZip">78701</span></li>
        </ul>
      </div>

      <!-- (2) Destination Location -->
      <div class="section">
        <h6>Destination Location</h6>
        <ul class="kv">
          <li><strong>City:</strong> <span id="destCity">San Antonio</span></li>
          <li><strong>ZIP Code:</strong> <span id="destZip">78205</span></li>
        </ul>
      </div>

      <!-- Vehicle -->
      <div class="section">
        <h6>Vehicle</h6>
        <ul class="kv">
          <li id="vehicleLine">2018 Toyota Camry Sedan • VIN: 1HGCM82633A004352</li>
        </ul>
      </div>

      <!-- (3) Pricing -->
      <div class="section">
        <h6>Offer Details</h6>

        <div class="row g-3">
          <div class="col-12 col-md-6">
            <div class="pill">
              <div class="k">Service Price</div>
              <div class="v" id="basePrice">$95.00</div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pill">
              <div class="k">Enroute</div>
              <div class="small">
                Miles: <strong id="enrouteMiles">12.50</strong>
                &nbsp;·&nbsp;
                Free: <strong id="enrouteFree">5.00</strong>
              </div>
              <div class="small mt-1">
                <strong>Per-mile:</strong> <span id="enroutePerMile">$3.00</span>
                &nbsp;|&nbsp;
                <strong>Cost:</strong> <span id="enrouteCost">$22.50</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pill">
              <div class="k">Loaded</div>
              <div class="small">
                Miles: <strong id="loadedMiles">18.00</strong>
                &nbsp;·&nbsp;
                Free: <strong id="loadedFree">5.00</strong>
              </div>
              <div class="small mt-1">
                <strong>Per-mile:</strong> <span id="loadedPerMile">$4.00</span>
                &nbsp;|&nbsp;
                <strong>Cost:</strong> <span id="loadedCost">$52.00</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pill pill-success">
              <div class="k">Quoted Price</div>
              <div class="v" id="quotedPrice" style="font-size: 1.25rem; font-weight: 900; color: rgba(15,23,42,.92);">
                $170.00
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- (4) Actions -->
      <div class="section">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-2">
          <p class="mb-0 fw-semibold text-secondary">Your prompt response is appreciated.</p>
          <div class="small text-secondary fw-semibold">Choose Accept or Reject below.</div>
        </div>

        <!-- No backend form, just UI behavior -->
        <form class="mt-3" onsubmit="return false;">
          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch gap-2">
            <button type="button" id="acceptBtn" class="btn btn-blue btn-pill w-100 mt-0 mt-md-2">Accept</button>
            <button type="button" id="rejectBtn" class="btn-reject btn-pill w-100 mt-0 mt-md-2">Reject</button>
          </div>

          <!-- Accept (ETA) -->
          <div id="etaSection" class="hidden mt-3">
            <label for="eta" class="form-label fw-bold">ETA (Estimated Time of Arrival)</label>
            <select id="eta"></select>

            <div class="mt-3">
              <button type="button" id="confirmAccept" class="btn btn-blue btn-pill w-100 mt-0 mt-md-2">
                Confirm Accept
              </button>
            </div>
          </div>

          <!-- Reject (Reason) -->
          <div id="dropReasonSection" class="hidden mt-3">
            <label for="drop_reason" class="form-label fw-bold">Drop Reason</label>
            <select id="drop_reason">
              <option value="Out of Area">Out of Area</option>
              <option value="Equipment not Available">Equipment not Available</option>
              <option value="Inclement Weather">Inclement Weather</option>
            </select>

            <div class="mt-3">
              <button type="button" id="confirmReject" class="btn-reject btn-pill w-100 mt-0 mt-md-2">
                Submit Rejection
              </button>
            </div>
          </div>

          <!-- Result (fake submit) -->
          <div id="resultBox" class="alert alert-info mt-3 hidden mb-0"></div>
        </form>
      </div>

    </div>
  </div>

  <script>
    /**
     * ===========================
     * 1) STATIC DATA (no backend)
     * ===========================
     * Replace these values with whatever data you want, and the design stays the same.
     */
    const requestData = {
      expiresInSeconds: 5 * 60, // 5 minutes countdown

      providerName: "Premium Roadside",
      serviceName: "Tow",
      className: "Light Duty",

      pickup: { city: "Austin", state: "TX", zip: "78701" },
      destination: { city: "San Antonio", zip: "78205" },

      vehicleLine: "2018 Toyota Camry Sedan • VIN: 1HGCM82633A004352",

      pricing: {
        base_price: 95.00,
        enroute_miles: 12.50,
        enroute_free: 5.00,
        enroute_price_per_mile: 3.00,

        loaded_miles: 18.00,
        loaded_free: 5.00,
        loaded_price_per_mile: 4.00
      }
    };

    // Helpers
    const money = (n) => `$${Number(n).toFixed(2)}`;
    const num2 = (n) => Number(n).toFixed(2);

    /**
     * ===========================
     * 2) RENDER DATA INTO UI
     * ===========================
     */
    function renderRequest(data){
      // Top
      document.getElementById('providerName').textContent = data.providerName;
      document.getElementById('serviceName').textContent = data.serviceName;
      document.getElementById('className').textContent = data.className;

      // Locations
      document.getElementById('pickupCity').textContent = data.pickup.city;
      document.getElementById('pickupState').textContent = data.pickup.state;
      document.getElementById('pickupZip').textContent = data.pickup.zip;

      document.getElementById('destCity').textContent = data.destination.city;
      document.getElementById('destZip').textContent = data.destination.zip;

      // Vehicle
      document.getElementById('vehicleLine').textContent = data.vehicleLine;

      // Pricing calc (same idea as your backend breakdown)
      const p = data.pricing;

      const enrouteBillable = Math.max(0, p.enroute_miles - p.enroute_free);
      const loadedBillable  = Math.max(0, p.loaded_miles - p.loaded_free);

      const enroute_cost = +(enrouteBillable * p.enroute_price_per_mile).toFixed(2);
      const loaded_cost  = +(loadedBillable  * p.loaded_price_per_mile).toFixed(2);

      const rawFinal = +(p.base_price + enroute_cost + loaded_cost).toFixed(2);
      const final = Math.ceil(rawFinal / 5) * 5; // round up to nearest $5

      // Fill UI
      document.getElementById('basePrice').textContent = money(p.base_price);

      document.getElementById('enrouteMiles').textContent = num2(p.enroute_miles);
      document.getElementById('enrouteFree').textContent = num2(p.enroute_free);
      document.getElementById('enroutePerMile').textContent = money(p.enroute_price_per_mile);
      document.getElementById('enrouteCost').textContent = money(enroute_cost);

      document.getElementById('loadedMiles').textContent = num2(p.loaded_miles);
      document.getElementById('loadedFree').textContent = num2(p.loaded_free);
      document.getElementById('loadedPerMile').textContent = money(p.loaded_price_per_mile);
      document.getElementById('loadedCost').textContent = money(loaded_cost);

      document.getElementById('quotedPrice').textContent = money(final);
    }

    /**
     * ===========================
     * 3) ETA OPTIONS
     * ===========================
     */
    function fillEtaOptions(){
      const eta = document.getElementById('eta');
      eta.innerHTML = "";

      for (let i = 5; i <= 60; i += 5){
        const opt = document.createElement('option');
        opt.value = String(i);
        opt.textContent = `${i} minutes`;
        eta.appendChild(opt);
      }
      for (let i = 75; i <= 120; i += 15){
        const opt = document.createElement('option');
        opt.value = String(i);
        opt.textContent = `${i} minutes`;
        eta.appendChild(opt);
      }
    }

    /**
     * ===========================
     * 4) COUNTDOWN + UI ACTIONS
     * ===========================
     */
    renderRequest(requestData);
    fillEtaOptions();

    let timeRemaining = requestData.expiresInSeconds;
    const timerElement = document.getElementById('timer');

    const rejectBtn = document.getElementById('rejectBtn');
    const acceptBtn = document.getElementById('acceptBtn');

    const etaSection = document.getElementById('etaSection');
    const dropReasonSection = document.getElementById('dropReasonSection');

    const confirmAccept = document.getElementById('confirmAccept');
    const confirmReject = document.getElementById('confirmReject');
    const resultBox = document.getElementById('resultBox');

    function showResult(message, type){
      resultBox.classList.remove('hidden','alert-info','alert-success','alert-danger','alert-warning');
      resultBox.classList.add(type);
      resultBox.textContent = message;
    }

    const countdown = setInterval(function () {
      let minutes = Math.floor(timeRemaining / 60);
      let seconds = timeRemaining % 60;
      seconds = seconds < 10 ? '0' + seconds : seconds;
      timerElement.textContent = `${minutes}:${seconds}`;
      timeRemaining--;

      if (timeRemaining < 0) {
        clearInterval(countdown);
        timerElement.textContent = "This link has expired.";
        acceptBtn.disabled = true;
        rejectBtn.disabled = true;
        confirmAccept.disabled = true;
        confirmReject.disabled = true;
        showResult("This request expired — actions are disabled.", "alert-warning");
      }
    }, 1000);

    rejectBtn.addEventListener('click', function() {
      dropReasonSection.style.display = 'block';
      etaSection.style.display = 'none';
      resultBox.classList.add('hidden');
    });

    acceptBtn.addEventListener('click', function() {
      etaSection.style.display = 'block';
      dropReasonSection.style.display = 'none';
      resultBox.classList.add('hidden');
    });

    // Fake submit handlers (no backend)
    confirmAccept.addEventListener('click', function(){
      const eta = document.getElementById('eta').value;
      showResult(`Accepted ✅  ETA selected: ${eta} minutes. (No backend submission)`, "alert-success");
    });

    confirmReject.addEventListener('click', function(){
      const reason = document.getElementById('drop_reason').value;
      showResult(`Rejected ❌  Reason: "${reason}". (No backend submission)`, "alert-danger");
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

@endsection