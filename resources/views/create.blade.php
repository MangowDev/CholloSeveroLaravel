<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un chollo</title>

    <link rel="stylesheet" href="{{ asset('css/crear.css') }}">

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

    <section class="container-fluid p-4">
        <form class="container-fluid px-4" action="{{ route('chollos.createDeal') }}" method="POST">
            @csrf
            <div class="row form-row">
                <h4>Create Deal</h4>
            </div>
            <div class="row form-row">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" maxlength="30" required value="{{ old('title') }}">
                </div>
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="price">Price:</label>
                    <input type="number" id="price" step="0.01" name="price" required value="{{ old('price') }}">
                </div>
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="previous_price">Previous price:</label>
                    <input type="number" id="previous_price" step="0.01" name="previous_price" required value="{{ old('previous_price') }}">
                </div>
            </div>
            <div class="row form-row">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="rating">Rating:</label>
                    <input type="number" id="rating" max="5" min="0.5" step="0.01" name="rating" required value="{{ old('rating') }}">
                </div>
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="shop">Shop:</label>
                    <input type="text" id="shop" name="shop" maxlength="50" required value="{{ old('shop') }}">
                </div>
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="image">Image:</label>
                    <input type="text" id="image" name="image" maxlength="300" value="{{ old('image') }}">
                </div>
            </div>
            <div class="row form-row">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" maxlength="50" required value="{{ old('category') }}">
                </div>
                <div class="col-lg-4 col-6 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="url">Url:</label>
                    <input type="text" id="url" name="url" maxlength="300" value="{{ old('url') }}">
                </div>
                <div id="checkAvailabilityDiv" class="col-lg-4 col-6 d-flex flex-row align-items-center justify-content-left text-left form-col">
                    <label for="available">Available: </label>
                    <input type="hidden" name="available" value="0">
                    <input type="checkbox" id="available" name="available" value="1" {{ old('available') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-12 d-flex flex-column align-items-start justify-content-start text-left form-col">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" maxlength="200">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex flex-row align-items-end justify-content-end text-left">
                    <button type="submit">Create</button>
                </div>
            </div>
        </form>

    </section>

    <script src="https://kit.fontawesome.com/8b39d50696.js" crossorigin="anonymous"></script>
</body>

</html>