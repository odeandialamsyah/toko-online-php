<?php require 'views/partials/header.php'; ?>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">User Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</p>
    <!-- Tambahkan konten dashboard user di sini -->
</div>
<?php require 'views/partials/footer.php'; ?>
