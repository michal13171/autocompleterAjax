<?php

use classes\Products;

require_once './config/autoloader.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="node_modules/ajax/lib/ajax.js"></script>

    <title>Wyszukiwarka produktów!</title>
</head>
<body>
<h1 class="text-center">Lista produktów!</h1>
<div class="wrapper" style="margin: 0 auto; width: 1002px;">
    <form class="form-inline my-2 my-lg-0" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Wyszukaj</button>
    </form>
    <?php
    $products = new Products();


    ?>
    <br>
    <table class="table table-sm table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST['search']) and strlen($_POST['search']) > 3) {
            $search = trim(htmlentities($_POST['search']));

            $ress = $products->findNameProduct($search);
            $finalResult = $ress->fetchAll(PDO::FETCH_ASSOC);

            foreach ($finalResult as $product) {
                ?>
                <tr>
                    <th scope="row"><?= $product['id']; ?></th>
                    <td><?= $product['name'] ?></td>
                </tr>
                <?php
            }
        } else {
            $res = $products->getAllProducts();

            foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $product) {
                ?>
                <tr>
                    <th scope="row"><?= $product['id']; ?></th>
                    <td><?= $product['name']; ?></td>
                </tr>
            <?php }
        }
        ?>

        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="node_modules/popper.js/dist/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.jshttps://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>
