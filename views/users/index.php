<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <h1>Users</h1>
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= (int) $user->id ?></td>
          <td><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
      <?php endforeach; ?>
      <?php if (!$users): ?>
        <tr><td colspan="3">No users found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
