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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Wyszukiwarka produktów!</title>
</head>
<body>
<h1 class="text-center">Lista produktów!</h1>
<div class="wrapper" style="margin: 0 auto; width: 1002px;">
    <form id="searcher" class="form-inline my-2 my-lg-0" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input class="form-control mr-sm-2" id="search" type="search" name="search" placeholder="Search"
               aria-label="Search">
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
        if (isset($_POST['search'])) {
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

<script src="js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
