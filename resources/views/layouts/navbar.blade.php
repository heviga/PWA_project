<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}">Uctovnictvo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dashboard
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('companies.index') }}">Companies</a></li>
                    <li><a href="{{ route('invoices.index') }}">Invoices</a></li>
                    <li><a href="{{ route('customers.index') }}">Customers</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    </ul>
            </ul>
        </div>
    </div>
</nav> 