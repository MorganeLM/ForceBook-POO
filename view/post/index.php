<?php
$title = 'List of posts';
ob_start();
?>
<h1>Post</h1>
<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Created at</th>
                    <th>Created by</th>
                    <th>Content</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <td><?= $post->getId(); ?></td>
                        <td><?= $post->getCreatedAt()->format('Y-m-d H:i'); ?></td>
                        <td><?= $post->getCreatedBy(); ?></td>
                        <td><?= $post->getContent(); ?></td>
                        <td>
                            <a href="index.php?ctrl=post&action=edit&id=<?= $post->getId() ?>" class="btn btn-primary">
                                Edit
                            </a>
                        
                            <a href="index.php?ctrl=post&action=delete&id=<?= $post->getId() ?>" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="index.php?ctrl=post&action=create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add a post</a>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../template.php';
?>
