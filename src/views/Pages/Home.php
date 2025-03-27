<?php
// Kiểm tra tham số trên URL để hiển thị nội dung phù hợp
$page = isset($_GET['login']) ? 'login' : 'home';
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
        } else {
            include '../Components/Banner/Banner.php';
            include '../Components/Products/Products.php';
            include '../Components/Feature/Feature.php';
        }
        ?>
    </div>

    <?php include '../config/script.php'; ?>
    <?php include '../layout/includes/Footer.php'; ?>
</body>

</html>