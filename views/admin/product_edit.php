<?php require 'views/partials/header.php'; ?>

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-900 text-center">Edit Product</h1>
    
    <form action="index.php?action=admin&admin_action=edit_product&id=<?php echo htmlspecialchars($product['id']); ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Product Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                value="<?php echo htmlspecialchars($product['name']); ?>"
                required
            />
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea
                id="description"
                name="description"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                rows="4"
                required
            ><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                step="0.01"
                value="<?php echo htmlspecialchars($product['price']); ?>"
                required
            />
        </div>
        <div class="mb-4">
            <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL</label>
            <input
                type="text"
                id="image_url"
                name="image_url"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                value="<?php echo htmlspecialchars($product['image_url']); ?>"
                required
            />
        </div>
        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg"
            >
                Save Changes
            </button>
            <a href="index.php?action=admin&admin_action=list_products" class="text-blue-500 hover:text-blue-700">
                Back to Product List
            </a>
        </div>
    </form>
</div>

<?php require 'views/partials/footer.php'; ?>
