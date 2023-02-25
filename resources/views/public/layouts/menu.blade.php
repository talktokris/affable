<div class="nav-inner justify-content-center">

    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
            <ul id="nav" class="navbar-nav ms-auto" style="text-align:center;">
                <li class="nav-item">
                    <a href="{{ url("/home") }}" class="active" aria-label="Toggle navigation">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("/partners") }}" aria-label="Toggle navigation">Partners</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("/statics") }}" aria-label="Toggle navigation">Statics</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("/withdrawal") }}" aria-label="Toggle navigation">Withdrawal</a>
                </li>


                <li class="nav-item">
                    <a href="{{ url("/log-out") }}" aria-label="Toggle navigation">Logout</a>
                </li>
            </ul>
        </div> <!-- navbar collapse -->
    </nav>
    <!-- End Navbar -->
</div>