<?php if ($errors): ?>
  <div class="alert alert-danger" role="alert">
    <ul class="mb-0">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['users_csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input id="name" name="name" type="text" class="form-control" maxlength="255" required
         value="<?= htmlspecialchars($user->name ?? '', ENT_QUOTES, 'UTF-8') ?>">
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input id="email" name="email" type="email" class="form-control" maxlength="254" required
         value="<?= htmlspecialchars($user->email ?? '', ENT_QUOTES, 'UTF-8') ?>">
</div>
<div class="mb-3">
  <label for="password" class="form-label"><?= $user->id ? 'New password (optional)' : 'Password' ?></label>
  <input id="password" name="password" type="password" class="form-control" autocomplete="new-password"
         minlength="8" maxlength="72" aria-describedby="password-help" <?= $user->id ? '' : 'required' ?>>
  <div id="password-help" class="form-text">
    Use 8 to 72 bytes. <?= $user->id ? 'Leave both password fields empty to keep the current password.' : '' ?>
  </div>
</div>
<div class="mb-3">
  <label for="password_confirm" class="form-label">Confirm password</label>
  <input id="password_confirm" name="password_confirm" type="password" class="form-control" autocomplete="new-password"
         minlength="8" maxlength="72" <?= $user->id ? '' : 'required' ?>>
</div>
