<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <title>TowNow</title>

    <style>
        html, body {
        height: 100%;
        margin: 0;
    }

    body {
        min-height: 100vh;
    }

    main {
        height: calc(100vh - 64px);
    }

    .map-page{
        position: relative;
        height: 100%;
        width: 100%;
    }

    #map{
        position: absolute;
        inset: 0;
    }

    .map-overlay{
        position:absolute;
        left:50%;
        top:52%;
        transform:translate(-50%,-50%);
        width:min(620px,92vw);
        background:rgba(255,255,255,.72);
        border-radius:26px;
        padding:22px 18px;
        backdrop-filter:blur(12px);
        box-shadow:0 18px 55px rgba(2,8,23,.22);
        text-align:center;
        z-index:5;
    }

        :root{
            --brand:#0ea5e9;
            --brand-2:#38bdf8;
            --ink:#0f172a;
            --muted:rgba(15,23,42,.72);
            --brand-dark:#2d3663;
            --bg:#f5f7fb;
            --card:#ffffff;
            --ring:rgba(14,165,233,.35);
        }
        body{
            font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
            background:radial-gradient(900px 420px at 50% -20%,rgba(14,165,233,.16),transparent 60%),var(--bg);
            color:var(--ink);
        }
        .topbar{
            background:#fff;
            box-shadow:0 2px 14px rgba(2,8,23,.06);
            position:sticky;
            top:0;
            z-index:10;
        }
        .brand-link{text-decoration:none}
        .brand-logo{width:34px;height:34px;object-fit:contain}
        .brand-title{color:var(--brand-dark);font-weight:800}
        .btn-soft-phone{
            background:rgba(14,165,233,.10);
            border:1px solid rgba(14,165,233,.18);
            color:var(--brand-dark);
            border-radius:999px;
            padding:10px 14px;
        }
        .page-wrap{
            max-width:980px;
            margin:0 auto;
            padding:26px 16px 40px;
        }
        .page-head{text-align:center;margin-top:10px}
        .page-head h3{font-weight:800;margin-bottom:6px}
        .page-head .sub{color:var(--muted);font-weight:600}
        .tile-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
            margin-top:18px;
        }
        @media(max-width:767px){
            .tile-grid{grid-template-columns:repeat(2,1fr)}
        }
        .tile-wrap{
            display:flex;
            flex-direction:column;
            gap:10px;
            align-items:center;
            cursor:pointer;
        }
        .tile-input,.class-input{position:absolute;opacity:0}
        .service-tile{
            width:100%;
            aspect-ratio:1/1;
            border-radius:18px;
            background:linear-gradient(180deg,var(--brand-2),var(--brand));
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:0 14px 30px rgba(14,165,233,.22);
        }
        .service-tile svg{width:54px;height:54px}
        .tile-label{font-weight:700}
        .tile-selected .service-tile{
            outline:4px solid rgba(255,255,255,.85);
            box-shadow:0 18px 40px rgba(14,165,233,.38);
        }
        .class-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:12px;
            margin-top:10px;
        }
        .class-card{
            background:rgba(255,255,255,.72);
            border:1px solid rgba(15,23,42,.10);
            border-radius:16px;
            padding:14px;
            display:flex;
            gap:12px;
            cursor:pointer;
            position:relative;
        }
        .class-selected{
            border-color:rgba(14,165,233,.55);
            box-shadow:0 0 0 4px var(--ring);
        }
        .check-dot{
            position:absolute;
            right:12px;
            top:12px;
            width:18px;
            height:18px;
            border-radius:50%;
            border:2px solid rgba(15,23,42,.18);
        }
        .class-selected .check-dot{
            background:var(--brand);
            border-color:var(--brand);
        }
        .btn-blue{
            background:var(--brand);
            color:#fff;
            border:none;
            border-radius:999px;
            padding:12px;
            font-weight:800;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md topbar py-2">
    <div class="container-fluid px-3">
        <a class="navbar-brand d-flex align-items-center gap-2 brand-link" href="#">
            <img class="brand-logo" src="/images/logo.png">
            <span class="brand-title">TowNow</span>
        </a>
        <a class="btn btn-soft-phone ms-auto" href="tel:8333869669">833-386-9669</a>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
