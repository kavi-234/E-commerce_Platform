<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boutique Shop</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://static.vecteezy.com/system/resources/previews/007/944/085/original/boutique-logo-design-template-free-vector.jpg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7; /* Soft background for the whole page */
        }
        header {
            background-color: #232f3e;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .search-bar {
            flex-grow: 1;
            margin: 0 20px;
            display: flex;
        }
        .search-bar input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }
        .search-bar button {
            padding: 8px 16px;
            border: none;
            background-color: #febd69;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        .nav-links a {
            margin: 0 10px;
            color: white;
            text-decoration: none;
        }
        .hero {
            background-image: url('https://thearchitectsdiary.com/wp-content/uploads/2020/10/nikhil-Jain-feat.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1, .hero p {
            color: #f5dbdb;
        }
        .hero img {
            border-radius: 10px;
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
        .shaded-heading {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black shade */
            display: inline-block;
            padding: 20px 40px;
            border-radius: 8px; /* Rounded corners */
        }
        .featured-products {
            padding: 20px;
            background-color: white;
        }
        .featured-products h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            border-radius: 8px; /* Added a modern touch */
        }
        .product img {
            width: 100%;
            height: 200px; /* Ensures square shape */
            object-fit: cover;
            border-radius: 8px; /* Matches the product box */
        }
        .add-to-cart {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #febd69;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .add-to-cart:hover {
            background-color: #ff9e2f; /* Darker shade on hover */
        }
        footer {
            background-color: #232f3e;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Boutique Shop</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for products">
            <button>Search</button>
        </div>
        <div class="nav-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <div class="hero">
        <div>
            <div class="shaded-heading">
                <h1>Welcome to Boutique Shop</h1>
                <p>Your one-stop destination for online shopping.</p>
            </div>
        </div>
    </div>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product">
                <img src="https://th.bing.com/th/id/OIP.EvzIDzViOEaw-wz8ypBVoAHaJ4?rs=1&pid=ImgDetMain" alt="Product 1">
                <p>Sweater</p>
                <p>$99.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <img src="https://static.vecteezy.com/system/resources/previews/000/197/694/original/premium-cosmetic-brand-advertising-concept-design-with-glitters-vector.jpg" alt="Product 2">
                <p>Cosmetics</p>
                <p>$49.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <img src="https://th.bing.com/th/id/OIP.ksZyUasNjX_vtFh4INjq4QAAAA?rs=1&pid=ImgDetMain" alt="Product 3">
                <p>Hat</p>
                <p>$19.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <img src="https://th.bing.com/th/id/OIF.OVfug2kQVU1WH48HaI5tFw?rs=1&pid=ImgDetMain" alt="Product 4">
                <p>Frock</p>
                <p>$99.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <img src="https://imagesvc.meredithcorp.io/v3/mm/image?q=85&c=sc&poi=face&w=1024&h=536&url=https://static.onecms.io/wp-content/uploads/sites/28/2014/10/local-experts-london-best-womens-clothing-boutiques.jpg" alt="Product 5">
                <p>Party Frock</p>
                <p>$49.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="product">
                <img src="https://th.bing.com/th/id/OIP.vQnXiGwl2BRkZSrzcEEG4wHaHa?rs=1&pid=ImgDetMain" alt="Product 6">
                <p>Handbag</p>
                <p>$19.99</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Boutique Shop. All rights reserved.</p>
    </footer>
</body>
</html>
