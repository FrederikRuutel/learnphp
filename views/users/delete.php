<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <h1>Delete User</h1>
  <p>Are you sure you want to delete <strong><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></strong>
    (<?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?>)? This cannot be undone.</p>
  <?php if ((int) $_SESSION['userID'] === (int) $user->id): ?>
    <p class="alert alert-warning">This is your own account. Deleting it will also sign you out.</p>
  <?php endif; ?>
  <form action="/admin/users/delete?id=<?= (int) $user->id ?>" method="POST">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['users_csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
    <button type="submit" class="btn btn-danger">Delete user</button>
    <a href="/admin/users" class="btn btn-secondary">Cancel</a>
  </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
