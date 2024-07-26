<?php require 'views/partials/header.php'; ?>

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-900 text-center">Our Products</h1>
    
    <!-- Search Form -->
    <form action="index.php?action=search" method="GET" class="mb-8">
        <div class="relative">
            <input
                type="text"
                name="query"
                placeholder="Search products..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>"
            />
            <button
                type="submit"
                class="absolute right-0 top-0 mr-2 px-4 py-2  text-black rounded-lg"
            >
                Search
            </button>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if (!empty($products) && is_array($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-48 object-cover object-center">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold mb-2"><?php echo htmlspecialchars($product['name']); ?></h2>
                        <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp.<?php echo number_format($product['price'], 2); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-gray-700">No products available.</p>
        <?php endif; ?>
    </div>
</div>

<?php require 'views/partials/footer.php'; ?>
