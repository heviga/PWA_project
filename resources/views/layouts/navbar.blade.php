<nav class="navbar navbar-expand-lg bg-light mb-5 shadow p-3"> 
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('welcome') }}">Uctovnictvo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Dashboard</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>
                        <li><a class="dropdown-item" href="{{ route('companies.index') }}">Companies</a></li>
                        <li><a class="dropdown-item" href="{{ route('invoices.index') }}">Invoices</a></li>
                        <li><a class="dropdown-item" href="{{ route('customers.index') }}">Customers</a></li>
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
