<?php include_once "header.php"; ?>

<div class="container mt-4 mb-4">
    <?php
    require_once "connect_db.php";

    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM post ORDER BY when_posted DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $stmt->fetchAll();
    ?>

    <?php foreach ($posts as $post) : ?>
        <div class="media mb-4">
            <img src="<?= $post["avatar_url"] ?>" class="mr-3" alt="user-<?= $post["id"] ?>" width="64">
            <div class="media-body">
                <h5 class="mt-0 mb-0"><?= $post["username"] ?></h5>
                <p class="mb-1"><small class="text-muted"><?= $post["when_posted"] ?></small></p>
                <p class="mb-1"><?= $post["message"] ?></p>
                <p>
                    <?php if (!empty($post["image_url"])) : ?>
                        <img src="<?= $post["image_url"] ?>" class="img-fluid" alt="img-<?= $post["id"] ?>" width="512">
                    <?php endif; ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include_once "footer.php"; ?>