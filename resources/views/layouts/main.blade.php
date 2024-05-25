<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Algoritma K-Means | {{ $title }}</title>

    <style>
    body {
        background-color: #f8f9fa;
    }

    .card-custom {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        /* Bootstrap secondary color */
        color: #000;
    }

    .table-responsive {
        max-height: 375px;
        overflow-y: auto;
    }

    .table-responsive thead {
        position: sticky;
        top: 0;
        z-index: 1000;
        /* Ensure the header stays above the body content */
    }

    thead th {
        background-color: #000;
        /* Match Bootstrap's thead-dark background */
    }
    </style>
</head>

<body>

    @include('partials.navbar')
    <div class="container mt-5 mt-5">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>