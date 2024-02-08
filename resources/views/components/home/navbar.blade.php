<nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('logo/f1.png') }}" class="img" style="margin-right: 25px; margin-left:10px;"
                height="50" width="50">OCRA-BLOG</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="{{ route('index') }}" aria-current="page">
                        <span class="m-1"> Home</span>
                        <i class="fa-solid fa-house"></i>
                        <span class="visually-hidden">(current)</span></a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="m-2"> Post</span>
                        <i class="fa-solid fa-ghost"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('post.create') }}">
                            <span class="m-2">Create</span>
                            <i class="fa-regular fa-square-plus m-2"> </i></a>
                        <a class="dropdown-item" href="{{ route('index') }}">
                            <span class="m-2">Read</span>
                            <i class="fa-solid fa-bookmark m-3"> </i>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="m-1">E-Book</span>
                        <i class="fa-solid fa-book"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('ebook.add') }}">
                            <span class="m-2">Add</span>
                            <i class="fa-regular fa-square-plus m-2"> </i>
                            <a class="dropdown-item" href="{{ route('ebook.display') }}">
                                <span class="m-2">Collection</span>
                                <i class="fa-solid fa-book-bookmark m-2"></i>

                            </a>
                    </div>
                </li>
            </ul>
            {{-- <!-- search -->
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search" />
                <button class="btn btn-outline-success btn-sm " type="submit">
                    Search
                </button>
            </form> --}}
            <!-- profile -->
            <div class="dropdown border rounded p-1">
                <button class="dropbtn" for="btnControl">{{ Auth::user()->name }}
                    <img width="24" height="24" src="https://img.icons8.com/material-sharp/24/sort-down.png"
                        alt="sort-down" />
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    {{-- <a href="#">Link 3</a> --}}
                </div>
            </div>
        </div>
</nav>

<div class="quote text-center m-3">
    {{-- using helper function (helper.php) --}}
    <strong class="text-primary">
        <span style='font-size:30px;'>&#128031;</span> {{ quote() }}
    </strong>
</div>
