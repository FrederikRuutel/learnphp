<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <form action="/admin/articles" method="POST">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" id="title" placeholder="Some cool title">
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Content</label>
      <textarea name="body" class="form-control" id="body" rows="12"></textarea>
    </div>
    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input name="date" type="date" class="form-control" id="date" placeholder="Some cool date">
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input name="author" type="text" class="form-control" id="author" placeholder="Some cool author">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>