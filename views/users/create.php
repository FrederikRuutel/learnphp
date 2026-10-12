<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <h1>New User</h1>
  <form action="/admin/users" method="POST">
    <?php include __DIR__ . '/_form.php'; ?>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/admin/users" class="btn btn-secondary">Cancel</a>
  </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
