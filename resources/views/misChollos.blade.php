<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chollos</title>
    <link rel="stylesheet" href="{{ asset('css/misChollos.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <header class="container-fluid d-flex flex-row align-items-center">
        <div class="col-lg-2 col-6 d-flex flex-row align-items-center justify-content-start text-left logo-div">
            <a href="{{ route('chollos') }}">
                <img src="{{ asset('assets/images/logo_images/LogoNoBg.png') }}" alt="logo">
            </a>
            <a href="{{ route('chollos') }}">
                <h1 class="logo-h1">Chollosevero</h1>
            </a>
        </div>

        <div class="col-lg-2 col-6 d-flex flex-row align-items-center justify-content-start text-left filters-div">
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
        <div class="col-lg-4 col-6 d-flex flex-row align-items-center justify-content-start text-left search-bar-div">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchbar" name="searchbar" placeholder="Search deals here...">
        </div>
        <div class="col-lg-3 col-6 d-flex flex-row align-items-center justify-content-end text-end user-div">
            <i class="fa-regular fa-user"></i>
            <h4>{{ auth()->user()->name }}</h4>
        </div>
    </header>

    <nav>
        <div>
            <a href="{{ route('chollos.create') }}">
                <i class="fa-solid fa-pencil"></i>
                <span>Create</span>
            </a>
        </div>
        <div>
            <a href="">
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

    <section class="container-fluid px-5 mt-5 main-deals-section">
        <h1>My deals</h1>
        <div class="row deals-row justify-content-between">
            @if($deals->isNotEmpty())
            @foreach($deals as $deal)
            <div class="row deals-row justify-content-between">
                <div class="d-flex flex-column align-items-start justify-content-start text-left deal-col">
                    <div class="d-flex flex-row align-items-center justify-content-start text-left deal-first-row">
                        <div class="col-xl-2 col-lg-3 col-12 d-flex flex-column align-items-start justify-content-start text-left deal-img-col">
                            <div class="deal-img" style="background: url('{{ $deal->image }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                        </div>
                        <div class="col-xl-9 col-lg-6 col-12 d-flex flex-column align-items-start justify-content-start text-left deal-info-col">
                            <div class="col-12 d-flex flex-row align-items-center justify-content-start text-left deal-title">
                                <h4>{{ $deal->title }}</h4>
                                <span><span>{{ $deal->previous_price }}€</span>{{ $deal->price }}€</span>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center justify-content-start text-left deal-rating">
                                @for ($i = 0; $i < floor($deal->rating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                    @endfor
                                    @if($deal->rating - floor($deal->rating) > 0)
                                    <i class="fa-solid fa-star-half"></i>
                                    @endif
                                    <span>Availability:
                                        @if ($deal->available === 1)
                                        <span>Yes</span>
                                        @else
                                        <span>No</span>
                                        @endif
                                    </span>
                            </div>
                            <div class="col-12 d-flex flex-row align-items-center justify-content-start text-left deal-shop-col">
                                <span class="shop-col">Shop: <span>{{ $deal->shop }}</span></span>
                                <span class="shop-col">Category: <span>{{ $deal->category }}</span></span>
                                <a href="{{$deal->url}}">Link to the deal</a>

                            </div>
                            <span>{{ $deal->description }}</span>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 d-flex flex-column align-items-start justify-content-start text-left deal-edit-col">
                            <form action="{{ route('chollos.edit', $deal->id) }}">
                                <button type="submit" class="edit-vertical-button">Edit</button>
                            </form>

                            <form action="{{ route('chollos.deleteDeal', $deal->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-vertical-button">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>No results found.</p>
            @endif
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