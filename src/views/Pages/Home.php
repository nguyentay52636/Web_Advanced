<?php
$isLogin  = isset($_GET['login']) && $_GET['login'] == 'true';
$isSignUp = isset($_GET['signup']) && $_GET['signup'] == 'true';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config/head.php'; ?>

<body>
    <?php include '../layout/includes/Header.php'; ?>
    <div class="main-content">
        <?php if ($isLogin): ?>
            <?php include '../Auth/Login.php'; ?>
        <?php elseif ($isSignUp): ?>
            <?php include '../Auth/SignUp.php'; ?>
        <?php else: ?>
            <?php include '../Components/Banner/Banner.php'; ?>
            <?php include '../Components/Products/Products.php'; ?>
            <?php include '../Components/Feature/Feature.php'; ?>
        <?php endif; ?>
    </div>
    <?php include '../config/script.php'; ?>
</body>

</html>