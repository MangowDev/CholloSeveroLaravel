<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chollos</title>
    <link rel="stylesheet" href="{{ asset('css/chollos.css') }}">
</head>

<body>
    <header class="header">
        <div class="logo-div">
            <a href="{{ route('deals.index') }}">
                <img src="{{ asset('assets/images/logo_images/LogoNoBg.png') }}" alt="logo">
            </a>
            <a href="{{ route('deals.index') }}">
                <h1 class="logo-h1">Chollosevero</h1>
            </a>
        </div>

        <div class="filters-div">
            <i class="fa-solid fa-bars"></i>
            <select name="filters" id="lang">
                <option value="default-option">Select filters here:</option>
                <option value="javascript">JavaScript</option>
                <option value="php">PHP</option>
                <option value="java">Java</option>
                <option value="python">Python</option>
                <option value="C#">C#</option>
                <option value="C++">C++</option>
            </select>
        </div>

        <div class="search-bar-div">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchbar" name="searchbar" placeholder="Search deals here...">
        </div>

        @if ($username)
            <div class="user-div">
                <i class="fa-regular fa-user"></i>
                <h4>{{ $username }}</h4>
            </div>
        @else
            <div class="user-div">
                <a class="login-register-a" href="{{ route('login') }}">
                    <h4>Login/Register</h4>
                </a>
            </div>
        @endif
    </header>

    @if ($username)
        <nav class="nav">
            <div>
                <a href="{{ route('deals.create') }}">
                    <i class="fa-solid fa-pencil"></i>
                    <span>Create</span>
                </a>
            </div>
            <div>
                <a href="{{ route('deals.index') }}">
                    <i class="fa-solid fa-sack-dollar"></i>
                    <span>My Deals</span>
                </a>
            </div>
            <div>
                <a href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    @endif

    <section class="main-deals-section">
        <h1>The best Deals!</h1>
        <div class="deals-row">
            @forelse ($deals as $deal)
                <div class="deal-col">
                    <div class="deal-first-row">
                    <div class="deal-img" style="background: url('{{ $deal->image }}');"></div>
                    <div class="deal-info-col">
                            <div class="deal-title">
                                <h4>{{ $deal->title }}</h4>
                                <span><span>{{ $deal->previous_price }}€</span>{{ $deal->price }}€</span>
                            </div>
                            <div class="deal-rating">
                                @for ($i = 0; $i < floor($deal->rating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @if ($deal->rating - floor($deal->rating) > 0)
                                    <i class="fa-solid fa-star-half"></i>
                                @endif
                            </div>
                            <span>{{ $deal->description }}</span>
                        </div>
                    </div>
                    <div class="deal-second-row">
                        <div class="shop-col">
                            <span>Shop: <span>{{ $deal->shop }}</span></span>
                        </div>
                    </div>
                </div>
            @empty
                <p>No deals found.</p>
            @endforelse
        </div>
    </section>

    <script src="https://kit.fontawesome.com/8b39d50696.js" crossorigin="anonymous"></script>
</body>

</html>
