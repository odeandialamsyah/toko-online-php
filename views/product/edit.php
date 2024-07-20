<!-- edit.php -->
<?php require 'views/partials/header.php'; ?>
<form action="dashboard.php?action=edit&id=<?php echo $product['id']; ?>" method="POST" class="max-w-md mx-auto mt-8">
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="<?php echo $product['name']; ?>" class="w-full p-2 border border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded"><?php echo $product['description']; ?></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700">Harga</label>
        <input type="number" name="price" id="price" value="<?php echo $product['price']; ?>" class="w-full p-2 border border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="image_url" class="block text-gray-700">URL Gambar</label>
        <input type="text" name="image_url" id="image_url" value="<?php echo $product['image_url']; ?>" class="w-full p-2 border border-gray-300 rounded">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui Produk</button>
</form>
<?php require 'views/partials/footer.php'; ?>
