<?php
    // require_once 'controllers/AccountController.php';
    require_once 'controllers/AccountController.php';

    $accountController = new AccountController();
    $accounts = $accountController->getAllAccounts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách Tài khoản</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Mật khẩu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?php echo $account->getId(); ?></td>
                <td><?php echo $account->getUsername(); ?></td>
                <td><?php echo $account->getPassword(); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>