<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Request Details</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Better font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand: #0ea5e9;
      --brand-2: #38bdf8;
      --ink: #0f172a;
      --muted: rgba(15, 23, 42, .72);
      --brand-dark: #2d3663;
      --bg: #f5f7fb;
      --ring: rgba(14,165,233,.35);
      --danger: #ef4232;
      --ok: #16a34a;
    }

    body{
      font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      background: radial-gradient(900px 420px at 50% -20%, rgba(14,165,233,.16), transparent 60%) , var(--bg);
      color: var(--ink);
    }

    /* ===== Header ===== */
    .topbar{
      background:#fff;
      box-shadow: 0 2px 14px rgba(2, 8, 23, 0.06);
      position: sticky;
      top: 0;
      z-index: 10;
    }
    .brand-link{ text-decoration:none; }
    .brand-logo{ width: 34px; height: 34px; object-fit: contain; }
    .brand-title{ color: var(--brand-dark); font-weight: 900; letter-spacing:.2px; }

    .btn-soft-phone{
      background: rgba(14,165,233,.10);
      border: 1px solid rgba(14,165,233,.18);
      color: var(--brand-dark);
      border-radius: 999px;
      padding: 10px 14px;
      transition: transform .12s ease, box-shadow .12s ease;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      gap: 8px;
    }
    .btn-soft-phone:hover{
      transform: translateY(-1px);
      box-shadow: 0 10px 22px rgba(14,165,233,.14);
    }

    /* Page */
    .page-wrap{
      max-width: 980px;
      margin: 0 auto;
      padding: 20px 16px 40px;
    }

    /* Card */
    .soft-card{
      border: 0;
      border-radius: 18px;
      box-shadow: 0 18px 50px rgba(2, 8, 23, 0.10);
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(10px);
    }

    /* Header row inside card */
    .title{
      font-weight: 900;
      letter-spacing: -0.02em;
      margin: 0;
      color: var(--brand-dark);
      line-height: 1.15;
    }
    .subtitle{
      color: var(--muted);
      font-weight: 600;
      margin: 0;
    }

    /* Chips */
    .chip{
      display:inline-flex;
      align-items:center;
      gap: 8px;
      border-radius: 999px;
      padding: .45rem .75rem;
      font-weight: 800;
      background: rgba(14,165,233,.10);
      border: 1px solid rgba(14,165,233,.18);
      color: var(--brand-dark);
      white-space: nowrap;
    }
    .chip small{ font-weight: 800; opacity: .9; }

    /* Sections */
    .section{
      border-top: 1px solid rgba(15,23,42,.08);
      padding-top: 16px;
      margin-top: 16px;
    }
    .section h6{
      letter-spacing: .08em;
      text-transform: uppercase;
      font-weight: 900;
      font-size: .82rem;
      color: var(--brand-dark);
      margin-bottom: 10px;
    }

    .kv{ margin: 0; padding: 0; list-style: none; }
    .kv li{
      margin: .25rem 0;
      color: rgba(15,23,42,.88);
      font-weight: 600;
    }
    .kv strong{ font-weight: 900; color: rgba(15,23,42,.92); }

    /* Summary line */
    .summary{
      display:flex;
      flex-wrap: wrap;
      gap: 10px;
      color: var(--muted);
      font-weight: 700;
      margin-top: 6px;
    }
    .summary .sep{ opacity: .45; }

    /* Offer blocks */
    .pill{
      background: rgba(241,245,249,.75);
      border: 1px solid rgba(15,23,42,.08);
      border-radius: 16px;
      padding: 14px 14px;
      height: 100%;
    }
    .pill .k{ font-weight: 900; margin-bottom: 6px; color: rgba(15,23,42,.92); }
    .pill .v{ color: var(--muted); font-weight: 700; }
    .pill .small{ color: rgba(15,23,42,.78); font-weight: 700; }

    .pill-success{
      background: rgba(22,163,74,.08);
      border-color: rgba(22,163,74,.18);
    }

    /* Inputs */
    select, input[type="text"], input[type="number"]{
      width:100%;
      padding: 12px 14px;
      margin-top: 6px;
      border-radius: 14px;
      border: 1px solid rgba(15,23,42,.12);
      font-size: 1rem;
      color: #111827;
      background: rgba(241,245,249,.75);
      box-shadow: none !important;
      outline: none;
    }
    select:focus, input[type="text"]:focus, input[type="number"]:focus{
      background: rgba(241,245,249,.92);
      border-color: rgba(14,165,233,.45);
      box-shadow: 0 0 0 4px var(--ring) !important;
    }

    /* Buttons */
    .btn-accept{
      background: var(--brand);
      border:none;
      border-radius: 999px;
      transition: all .12s ease;
      color:#fff;
      padding: 12px 18px;
      font-weight: 900;
      box-shadow: 0 14px 30px rgba(14,165,233,.22);
    }
    .btn-accept:hover{ filter: brightness(.98); transform: translateY(-1px); }

    .btn-reject{
      background: transparent;
      border: none;
      color: var(--danger);
      padding: 12px 2px;
      text-decoration:none;
      font-weight: 900;
    }
    .btn-reject:hover{ color: #c92f22; }

    .hidden{ display:none; }

    /* Responsive tweaks */
    @media (max-width: 575px){
      .page-wrap{ padding: 14px 12px 34px; }
      .soft-card{ padding: 18px !important; }
      .chip{ width: 100%; justify-content: center; }
    }
  </style>
</head>

<body>

  <!-- Header (no backend) -->
  <nav class="navbar navbar-expand-md topbar py-2">
    <div class="container-fluid px-3">

      <!-- Burger (mobile) -->
      <button class="navbar-toggler border-0 shadow-none" type="button"
              data-bs-toggle="collapse" data-bs-target="#topNav"
              aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Center brand -->
      <a class="navbar-brand mx-auto d-flex align-items-center gap-2 brand-link" href="#">
        <img class="brand-logo" src="https://via.placeholder.com/34x34.png?text=T" alt="TowNow logo">
        <span class="brand-title">TowNow</span>
      </a>

      <!-- Desktop phone -->
      <div class="d-none d-md-flex align-items-center">
        <a class="btn-soft-phone" href="tel:8333869669" aria-label="Call TowNow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M6.5 3.5l3 1.2c.7.3 1.1 1 .9 1.7l-.8 2.5c-.2.6 0 1.3.5 1.7l2 1.7c.5.4 1.2.5 1.8.2l2.4-1.1c.7-.3 1.5 0 1.9.6l1.6 2.6c.4.7.3 1.6-.4 2.1-1.3 1-2.9 1.5-4.6 1.5-7.2 0-13-5.8-13-13 0-1.7.5-3.3 1.5-4.6.5-.7 1.4-.8 2.1-.4Z"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="fw-bold">833-386-9669</span>
        </a>
      </div>

      <div class="collapse navbar-collapse" id="topNav">
        <ul class="navbar-nav ms-auto mt-3 mt-md-0 align-items-md-center gap-md-2">
          <!-- Mobile phone -->
          <li class="nav-item d-md-none">
            <a class="nav-link fw-bold" href="tel:8333869669">833-386-9669</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Log in</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="page-wrap">
    <div class="card soft-card p-4 p-md-5">

      <!-- Title + timer -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
        <div>
          <h4 class="title">Request Details for <span id="providerName">Premium Roadside</span></h4>
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
            <button type="button" id="acceptBtn" class="btn-accept w-100 w-sm-auto">Accept</button>
            <button type="button" id="rejectBtn" class="btn-reject w-100 w-sm-auto text-center">Reject</button>
          </div>

          <!-- Accept (ETA) -->
          <div id="etaSection" class="hidden mt-3">
            <label for="eta" class="form-label fw-bold">ETA (Estimated Time of Arrival)</label>
            <select id="eta"></select>

            <div class="mt-3">
              <button type="button" id="confirmAccept" class="btn-accept w-100">
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
              <button type="button" id="confirmReject" class="btn-reject w-100 text-center">
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
</body>
</html>
