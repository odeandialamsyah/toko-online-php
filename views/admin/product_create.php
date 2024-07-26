<?php require 'views/partials/header.php'; ?>

<div class="container mx-auto p-4 max-w-3xl">
    <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Add New Product</h1>
    <form action="index.php?action=admin&admin_action=create_product" method="POST" class="bg-white shadow-lg rounded-lg p-8">
        <div class="grid grid-cols-1 gap-6">
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Product Name</label>
                <input type="text" name="name" id="name" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-lg font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-lg font-semibold mb-2">Price</label>
                <input type="text" name="price" id="price" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="image_url" class="block text-gray-700 text-lg font-semibold mb-2">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150">Add Product</button>
    </form>
</div>

<?php require 'views/partials/footer.php'; ?>
