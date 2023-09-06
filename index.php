<?php

    require_once __DIR__ . '/models/Shop.php';
    require_once __DIR__ . '/models/Customer.php';
    require_once __DIR__ . '/models/Order.php';
    require_once 'CreditCard.php';

    $dogCategory = new Category('Dog');
    $catCategory = new Category('Cat');

    include __DIR__ . '/data/product_data.php';

    foreach ($dogProducts as $product) {
        $dogCategory->addProduct($product);
    }

    foreach ($catProducts as $product) {
        $catCategory->addProduct($product);
    }

    $shop = new Shop();
    $shop->addCategory($dogCategory);
    $shop->addCategory($catCategory);

    $customer = new Customer('Tizio Incognito', '123 Sesame Street', 'password');

    $creditCard = new CreditCard('1234567812345678', 'Tizio Incognito', '12/24'); 

    $order = new Order($dogCategory->products, 100, $customer);

    try {
        
        $order->processPayment($creditCard);
    } catch (CreditCardExpiredException $e) {
        
        echo $e->getMessage();
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php oop 2</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">

            <a class="navbar-brand" href="#">Pet Shop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div class="container">

        <h1 class="my-5 text-center display-1">
            Pet Shop
        </h1>

        <?php foreach ($shop->categories as $category) : ?>

            <h4 class="mt-4">Category: <?= $category->name ?></h2>

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php foreach ($category->products as $product) : ?>

                        <div class="col">

                            <div class="card mb-3">

                                <img src="<?= $product->photo ?>" class="card-img-top img-fluid" alt="<?= $product->name ?>">

                                <div class="card-body">

                                    <h5 class="card-title"><?= $product->name ?></h5>
                                    <p class="card-text"><?= $product->description ?></p>
                                    <p class="card-text">Price: € <?= $product->price ?></p>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endforeach; ?>
    </div>
</body>

</html>