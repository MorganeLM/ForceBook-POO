<?php
$title = 'Posts';
ob_start();
?>

<h2>Add your post</h2>
<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="created_by">Author</label>
                <input type="number" class="form-control" name="created_by" id="created_by" aria-describedby="created_byHelp">
                <small id="created_byHelp" class="form-text text-muted">Select the author</small>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-lg btn-block">Add a post</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../template.php';
?>
