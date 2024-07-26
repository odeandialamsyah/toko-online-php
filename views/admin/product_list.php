<?php require 'views/partials/header.php'; ?>

<div class="container mx-auto p-4 max-w-6xl">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Product List</h1>
    <a href="index.php?action=admin&admin_action=create_product" class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Add New Product</a>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $product['id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $product['name']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $product['description']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $product['price']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="h-16 w-16 object-cover rounded-lg">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="index.php?action=admin&admin_action=edit_product&id=<?php echo $product['id']; ?>" class="text-blue-600 hover:text-blue-800">Edit</a>
                            <a href="index.php?action=admin&admin_action=delete_product&id=<?php echo $product['id']; ?>" class="text-red-600 hover:text-red-800 ml-4" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="h-40"></div>

<?php require 'views/partials/footer.php'; ?>
