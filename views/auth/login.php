<!-- login.php -->
<?php require 'views/partials/header.php'; ?>
<form action="index.php?action=login" method="POST" class="max-w-md mx-auto mt-8">
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
</form>
<?php require 'views/partials/footer.php'; ?>
