<?php include_once "header.php"; ?>

<div class="container mt-4 mb-4">
    <form method="post" action="post_action.php" class="mb-4">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="avatar_url">Avatar URL</label>
            <input type="text" class="form-control" name="avatar_url">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="text" class="form-control" name="image_url">
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
    <?php if (isset($_GET["error"])) : ?>
        <div class="alert alert-danger" role="alert">
            Invalid form parameters! Please try againg!
        </div>
    <?php endif; ?>
</div>

<?php include_once "footer.php"; ?>