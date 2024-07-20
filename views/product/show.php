<!-- show.php -->
<?php require 'views/partials/header.php'; ?>
<div class="max-w-lg mx-auto bg-white p-4 rounded">
    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-64 object-cover">
    <h2 class="text-2xl mt-4"><?php echo $product['name']; ?></h2>
    <p class="text-gray-600 mt-2"><?php echo $product['description']; ?></p>
    <p class="text-gray-800 mt-4"><?php echo $product['price']; ?></p>
</div>
<?php require 'views/partials/footer.php'; ?>
