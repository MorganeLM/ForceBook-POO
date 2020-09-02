<?php
$title = 'Home';
ob_start();
?>
<h1>Hello there 👋</h1>
<h2>Welcome to the next social network!</h2>
<?php foreach($users as $user) { ?>
	<h3><?= $user->getName(); ?> has joined us!</h3> 
<?php } ?>

<a class="nav-link" href="index.php?ctrl=user&action=index">
	<button type="button" class="btn btn-primary btn-lg">See Users</button>
</a>
<a class="nav-link" href="index.php?ctrl=post&action=index">
	<button type="button" class="btn btn-success btn-lg">See Posts</button>
</a>

<?php
$content = ob_get_clean();
require __DIR__ . '/../template.php';
?>
