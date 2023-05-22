<?php
session_start();

require_once "connection.php";

if (!isset($_SESSION["user_name"])) {
    header("location: index.php");
}

if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["typeId"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["country"]) && isset($_POST["price"]) && isset($_POST["imageURL"])) {
    try {
        $stmt = $conn->prepare("INSERT INTO real_estate_offers (reo_title, reo_description, ret_id, reo_address, reo_city, reo_country, reo_price, reo_img_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([$_POST["title"], $_POST["description"], $_POST["typeId"], $_POST["address"], $_POST["city"], $_POST["country"], $_POST["price"], $_POST["imageURL"]]);

        $conn = null;
        header("location: home.php");
    } catch (PDOException $e) {
        $conn = null;
        header("location: create.php?error={$e->getMessage()}");
    }
}

$stmt = $conn->prepare("SELECT ret_id, ret_name FROM real_estate_types");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$typesList = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create</title>
</head>

<body>
    <nav class="navbar navbar-light sticky-top bg-light navbar-expand-lg">
        <span class="navbar-brand mb-0 h1">Create</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <?php if (isset($_GET["error"])) : ?>
            <div class="alert alert-danger mb-4" role="alert">
                <?= $_GET["error"] ?>
            </div>
        <?php endif; ?>

        <form method="post" action="create.php">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="typeId">Type</label>
                <select class="form-control" name="typeId" required>
                    <?php foreach ($typesList as $row) : ?>
                        <option value="<?= $row["ret_id"] ?>"><?= $row["ret_name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="imageURL">Image URL</label>
                <textarea class="form-control" name="imageURL" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
$conn = null;
?>