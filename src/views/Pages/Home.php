<?php

$page = isset($_GET['login']) ? 'login' : (isset($_GET['page']) ? $_GET['page'] : 'home');
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config/head.php'; ?>

<body>
    <?php include '../layout/includes/Header.php'; ?>

    <div class="main-content">
        <?php
        if ($page === 'login') {
            include '../Auth/LoginAndSignUp.php';
        } elseif ($page === 'product-details') {

            include '../Components/Products/ProductDetails.php';
            include '../layout/includes/Footer.php';
        } else {
            include '../Components/Banner/Banner.php';
            include '../Components/Products/Products.php';
            include '../Components/Feature/Feature.php';
            include '../layout/includes/Footer.php';
        }
        ?>
    </div>

    <?php include '../config/script.php'; ?>

</body>

</html>