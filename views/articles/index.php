<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <a href="/admin/articles/create" class="btn btn-primary">New Article</a>
  <table class="table table-hover table-striped">
    <thead>
      <th>ID</th>
      <th>Title</th>
      <th>Date</th>
      <th>Author</th>
      <th>Actions</th>
    </thead>
    <tbody>
      <?php foreach (($articles ?? []) as $article): ?>
        <tr>
          <td><?= $article->id ?></td>
          <td><?= $article->title ?></td>
          <td><?= $article->date ?></td>
          <td><?= $article->author ?></td>
          <td>
            <div class="btn-group">
              <a href="#" class="btn btn-info">View</a>
              <a href="#" class="btn btn-warning">Edit</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>