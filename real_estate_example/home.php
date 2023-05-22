<?php
session_start();

require_once "connection.php";

if (!isset($_SESSION["user_name"])) {
    header("location: index.php");
}

$stmt = $conn->prepare("SELECT reo_id, reo_title, reo_description, ret_name, reo_address, reo_city, reo_country, reo_price, reo_img_url FROM real_estate_offers INNER JOIN real_estate_types USING (ret_id)");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$realEstateList = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-light sticky-top bg-light navbar-expand-lg">
        <span class="navbar-brand mb-0 h1">Home</span>
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

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Country</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image URL</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($realEstateList as $row) : ?>
                            <tr>
                                <th scope="row"><?= $row["reo_id"] ?></th>
                                <td><?= $row["reo_title"] ?></td>
                                <td><?= $row["reo_description"] ?></td>
                                <td><?= $row["ret_name"] ?></td>
                                <td><?= $row["reo_address"] ?></td>
                                <td><?= $row["reo_city"] ?></td>
                                <td><?= $row["reo_country"] ?></td>
                                <td><?= $row["reo_price"] ?></td>
                                <td><?= $row["reo_img_url"] ?></td>
                                <th><a href="javascript:confirmRemove(<?= $row["reo_id"] ?>);" type="button" class="btn btn-danger">Remove</a></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </table>
        </div>
    </div>
</body>

<script>
    function confirmRemove(id) {
        if (confirm("Are you sure you want to remove this record?")) {
            window.location.href = 'delete.php?id=' + id;
        }
    }
</script>

</html>

<?php
$conn = null;
?>