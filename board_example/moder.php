<?php
session_start();

include_once "header.php";

if (isset($_SESSION["login"])) {
    header("location: manage.php");
}
?>

<div class="container mt-4 mb-4">
    <form method="post" action="moder_action.php" class="mb-4">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php if (isset($_GET["error"])) : ?>
        <div class="alert alert-danger" role="alert">
            Invalid login or password!
        </div>
    <?php endif; ?>
</div>

<?php include_once "footer.php"; ?>