<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <table class="table table-hover table-striped">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?= $article->id ?></td>
      </tr>
      <tr>
        <th>Title</th>
        <td><?= $article->title ?></td>
      </tr>
      <tr>
        <th>Content</th>
        <td><?= $article->body ?></td>
      </tr>
      <tr>
        <th>Date</th>
        <td><?= $article->date ?></td>
      </tr>
      <tr>
        <th>Author</th>
        <td><?= $article->author ?></td>
      </tr>
    </tbody>
  </table>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>