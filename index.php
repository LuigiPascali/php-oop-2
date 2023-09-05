<?php

    require_once __DIR__ . '/models/Shop.php';

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