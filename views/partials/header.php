<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Toko Online</title>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl">Katalog Online OmKyu</h1>
            <nav>
                <a href="index.php" class="mr-4">Home</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="dashboard.php" class="mr-4">Dashboard</a>
                    <a href="index.php?action=logout">Logout</a>
                <?php else: ?>
                    <a href="index.php?action=login" class="mr-4">Login</a>
                    <!-- <a href="index.php?action=register">Register</a> -->
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
