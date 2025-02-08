<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uctovnictvo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- 🔹 Include Navbar -->
    @include('layouts.navbar')

    <!-- 🔹 MAIN CONTENT -->
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Uctovnictvo</h1>
        <p class="lead">Manage your invoices, companies, and customers easily.</p>

        <div class="mt-4">
            <a href="{{ route('companies.index') }}" class="btn btn-outline-dark btn-lg">View Companies</a>
            <a href="{{ route('invoices.index') }}" class="btn btn-outline-dark btn-lg">View Invoices</a>
            <a href="{{ route('customers.index') }}" class="btn btn-outline-dark btn-lg">View Customers</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
