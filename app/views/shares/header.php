<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RED HOOD NIKKE STORE</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Nikke Theme CSS -->
    <link href="/css/nikke-theme.css" rel="stylesheet">
    <style>
        .nikke-font {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }
        .nav-highlight {
            position: relative;
        }
        .nav-highlight::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--nikke-red), var(--nikke-gold));
            transition: width 0.3s ease;
        }
        .nav-highlight:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="nikke-bg-dark">
    <!-- Top Banner -->
    <div class="container-fluid bg-black py-1 border-bottom border-danger">
        <div class="row">
            <div class="col text-center">
                <h5 class="nikke-font mb-0 text-danger">
                    <i class="fas fa-bolt"></i> COMMANDER'S ARMORY <i class="fas fa-bolt"></i>
                </h5>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark nikke-bg-dark border-bottom border-danger">
        <div class="container">
            <a class="navbar-brand nikke-font text-danger" href="/webbanhang">
                <i class="fas fa-robot me-2"></i>RED HOOD NIKKE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Product menu -->
                    <li class="nav-item nav-highlight mx-2">
                        <a class="nav-link text-dark" href="/webbanhang/Product/">
                            <i class="fas fa-cubes me-1"></i>PRODUCTS
                        </a>
                    </li>
                    <li class="nav-item nav-highlight mx-2">
                        <a class="nav-link text-dark" href="/webbanhang/Product/add">
                            <i class="fas fa-plus-circle me-1"></i>ADD PRODUCT
                        </a>
                    </li>

                    <!-- Category menu -->
                    <li class="nav-item nav-highlight mx-2">
                        <a class="nav-link text-dark" href="/webbanhang/Category/">
                            <i class="fas fa-tags me-1"></i>CATEGORIES
                        </a>
                    </li>
                    <li class="nav-item nav-highlight mx-2">
                        <a class="nav-link text-dark" href="/webbanhang/Category/add">
                            <i class="fas fa-plus me-1"></i>ADD CATEGORY
                        </a>
                    </li>
                </ul>
                
                <!-- Cart -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/webbanhang/Product/cart">
                            <i class="fas fa-shopping-cart me-1"></i>
                            CART
                            <span class="badge rounded-pill bg-danger ms-1">
                                <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="container nikke-container mt-4 mb-5">