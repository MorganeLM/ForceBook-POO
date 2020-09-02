<?php
$title = 'Edit an user';
ob_start();
?>
<h2>Update your post</h2>
<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="created_by">Author</label>
                <input type="email" class="form-control" name="created_by" id="created_by" aria-describedby="created_byHelp" value="<?= $created_by ?>">
                <small id="created_byHelp" class="form-text text-muted">Select the author</small>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content"><?= $content ?></textarea>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success" name="save" value="Save">
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../template.php';
?>