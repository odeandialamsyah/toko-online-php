<!-- index.php -->
<?php require 'views/partials/header.php'; ?>
<form method="GET" action="index.php" class="mb-4">
    <input type="text" name="search" placeholder="Cari produk..." class="p-2 border border-gray-300 rounded">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
</form>

<div class="grid grid-cols-3 gap-4">
    <?php foreach ($products as $product): ?>
        <div class="border p-4 rounded bg-white">
            <a href="index.php?action=show&id=<?php echo $product['id']; ?>" class="block">
                <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-48 object-cover">
                <h2 class="text-xl mt-2"><?php echo $product['name']; ?></h2>
                <p class="text-gray-600"><?php echo $product['price']; ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php require 'views/partials/footer.php'; ?>
