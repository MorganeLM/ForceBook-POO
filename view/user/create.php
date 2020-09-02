<?php
$title = 'List of users';
ob_start();
?>

<h2>User management</h2>
<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else. LOL</small>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name='name' id="name">
            </div>
            <button type="submit" class="btn btn-light btn-lg btn-block">Add an user</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../template.php';
?>
