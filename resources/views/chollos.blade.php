<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chollos</title>
    <link rel="stylesheet" href="{{ asset('css/chollos.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header class="container-fluid d-flex flex-row align-items-center">
        <div class="col-lg-2 col-6 d-flex flex-row align-items-center justify-content-left text-left logo-div">
            <a href="{{ route('chollos') }}">
                <img src="{{ asset('assets/images/logo_images/LogoNoBg.png') }}" alt="logo">
            </a>
            <a href="{{ route('chollos') }}">
                <h1 class="logo-h1">Chollosevero</h1>
            </a>
        </div>

        <div class="col-lg-2 col-6 d-flex flex-row align-items-center justify-content-left text-left filters-div">
            <i class="fa-solid fa-bars"></i>
            <select name="filters" id="lang">
                <option value="default-option">Select filters here:</option>
                <option value="gaming">Gaming</option>
                <option value="programming">Programming</option>
                <option value="technology">Technology</option>
                <option value="clothes">Clothes</option>
                <option value="digital-products">Digital products</option>
            </select>
        </div>
        <div class="col-lg-4 col-6 d-flex flex-row align-items-center justify-content-left text-left search-bar-div">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchbar" name="searchbar" placeholder="Search deals here...">
        </div>

        @if ($username)
        <div class="col-lg-3 col-6 d-flex flex-row align-items-center justify-content-end text-end user-div">
            <i class="fa-regular fa-user"></i>
            <h4>{{ $username }}</h4>
        </div>
        @else
        <div class="col-lg-3 col-6 d-flex flex-row align-items-center justify-content-end text-end user-div">
            <a class="login-register-a" href="{{ route('login') }}">
                <h4>Login/Register</h4>
            </a>
        </div>
        @endif
    </header>

    @if ($username)
    <nav class="nav">
        <div>
            <a href="{{ route('chollos.create') }}">
                <i class="fa-solid fa-pencil"></i>
                <span>Create</span>
            </a>
        </div>
        <div>
            <a href="{{ route('misChollos') }}">
                <i class="fa-solid fa-sack-dollar"></i>
                <span>My Deals</span>
            </a>
        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
    @endif

    <section class="container-fluid px-5 mt-5 main-deals-section">
        <h1>The best Deals!</h1>
        <div class="row deals-row justify-content-between">
            @forelse ($deals as $deal)
            <div class="col-md-6 col-lg-4 d-flex flex-column align-items-start justify-content-start text-left deal-col">
                <div class="d-flex flex-row align-items-center justify-content-start text-left deal-first-row">
                    <div class="col-xl-3 col-lg-4 col-12 d-flex flex-column align-items-start justify-content-start text-left deal-img-col">
                        <div class="deal-img" style="background-image: url('{{ asset($deal->image) }}'); background-size: cover; background-position: center;"></div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-12 d-flex flex-column align-items-start justify-content-start text-left deal-info-col">
                        <div class="col-12 d-flex flex-row align-items-center justify-content-start text-left deal-title">
                            <h4>{{ $deal->title }}</h4>
                            <span><span>{{ $deal->previous_price }}€</span> {{ $deal->price }}€</span>
                        </div>
                        <div class="col-12 d-flex flex-row align-items-center justify-content-start text-left deal-rating">
                            @for ($i = 0; $i < floor($deal->rating); $i++)
                                <i class="fa-solid fa-star"></i>
                                @endfor
                                @if ($deal->rating - floor($deal->rating) > 0)
                                <i class="fa-solid fa-star-half"></i>
                                @endif
                                <span>Availabiliy:
                                    @if ($deal->available === 1)
                                    <span>Yes</span>
                                    @else
                                    <span>No</span>
                                    @endif
                                </span>
                        </div>
                        <span>{{ $deal->description }}</span>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-between justify-content-between text-left deal-second-row">
                    <div class="col-lg-4 d-flex flex-column align-items-start justify-content-start text-left shop-col">
                        <span>Shop: <span>{{ $deal->shop }}</span></span>
                        <span>Category: <span>{{ $deal->category }}</span></span>
                    </div>

                    @if ($username === $deal->user->name || $role === 'admin')
                    <div class="col-lg-4 d-flex flex-row align-items-end justify-content-center text-center shop-col">
                        <form action="{{ route('chollos.edit', $deal->id) }}">
                            <button type="submit" class="edit-button">Edit</button>
                        </form>
                        <form action="{{ route('chollos.deleteDeal', $deal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>


                    </div>
                    @endif

                    <div class="col-lg-4 d-flex flex-column align-items-end justify-content-end text-end shop-col">
                        <span>User: <span>{{ $deal->user->name }}</span></span>
                        <a href="{{$deal->url}}">Link to the deal</a>
                    </div>
                </div>
            </div>
            @empty
            <p>No results found.</p>
            @endforelse
        </div>
    </section>
    <footer class="container-fluid">
      <div class="row justify-content-between footer-row gap-lg-0 gap-4">
        <div
          class="col-lg-4 col-12 d-flex flex-row align-items-center justify-content-lg-start justify-content-center text-lg-start text-center footer-col"
        >
          <h4>- © MangoDev - 2025 | mangodev03@gmail.com</h4>
        </div>
        <div
          class="col-lg-4 col-12 d-flex flex-column align-items-center justify-content-center text-center footer-col"
        >
          <h4>
            Made with
            <a href="https://laravel.com/">Laravel</a>
          </h4>
        </div>
        <div
          class="col-lg-4 col-12 gap-3 d-flex flex-row align-items-center justify-content-lg-end justify-content-center footer-social-col"
        >
          <h4>My social:</h4>
          <a href="https://x.com/Angelniwe33">
            <i class="fa-brands fa-twitter"></i>
          </a>
          <a href="https://www.instagram.com/angeel_rc3/">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="https://github.com/MangowDev">
            <i class="fa-brands fa-github"></i>
          </a>
          <a href="https://es.linkedin.com/in/%C3%A1ngel-robles-76784a313">
            <i class="fa-brands fa-linkedin"></i>
          </a>
        </div>
      </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchBar = document.getElementById("searchbar");
            const deals = document.querySelectorAll(".deal-col");

            function searchDeals() {
                let query = searchBar.value.toLowerCase().trim();

                deals.forEach(deal => {
                    let title = deal.querySelector(".deal-title h4").textContent.toLowerCase();

                    if (!title.includes(query)) {
                        deal.classList.remove("deal-col");
                        deal.classList.add("hidden-col");
                    } else {
                        deal.classList.remove("hidden-col");
                        deal.classList.add("deal-col");
                    }
                });
            }

            searchBar.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    searchDeals();
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/8b39d50696.js" crossorigin="anonymous"></script>
</body>

</html>