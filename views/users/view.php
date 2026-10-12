<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <h1>View User</h1>
  <table class="table table-striped">
    <tbody>
      <tr><th scope="row">ID</th><td><?= (int) $user->id ?></td></tr>
      <tr><th scope="row">Name</th><td><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></td></tr>
      <tr><th scope="row">Email</th><td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td></tr>
    </tbody>
  </table>
  <a href="/admin/users" class="btn btn-secondary">Back to users</a>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
