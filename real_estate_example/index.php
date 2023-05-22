<?php
require_once "connection.php";

$conn = null;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-light sticky-top bg-light">
        <span class="navbar-brand mb-0 h1">Login</span>
    </nav>

    <div class="container mt-4">
        <form method="post" action="login.php" class="mb-4">
            <div class="form-group">
                <label for="userName">User name</label>
                <input type="text" class="form-control" name="userName" required>
            </div>
            <div class="form-group">
                <label for="userPass">User password</label>
                <input type="password" class="form-control" name="userPass" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if (isset($_GET["error"])) : ?>
            <div class="alert alert-danger" role="alert">
                Invalid login or password!
            </div>
        <?php endif; ?>
    </div>
</body>

</html>