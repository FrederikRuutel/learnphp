<?php include __DIR__ . '/partials/header.php'; ?>
<main class="container">
  <?php if(isset($_GET['name']) && isset($_GET['age'])): ?>
    <h1>Hello <?=  $_GET['name']?>! You are <?=  $_GET['age']?> years old.</h1>
  <?php endif; ?>
  <form>
    <label>
      Name:
      <input type="text" placeholder="Enter your name">
    </label>
    <label for="age">Age:</label>
      <input type="number" id="age" placeholder="Enter your age">
    <input type="submit" value="Submit">
      <button type="submit">Submit</button>
  </form>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>