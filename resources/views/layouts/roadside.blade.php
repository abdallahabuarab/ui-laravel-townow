<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>TowNow</title>

    
</head>
<body>

<nav class="navbar navbar-expand-md topbar py-3">
    <div class="container px-3">
        <a class="navbar-brand d-flex align-items-center gap-2 brand-link" href="#">
            <img class="brand-logo" src="/images/logo.png">
            <h1 class="brand-title">Tow Now</h1>
        </a>
        <a class="btn btn-soft-phone ms-auto" href="tel:8333869669">833-386-9669</a>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
