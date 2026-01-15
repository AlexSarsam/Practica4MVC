<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blog MVC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white border-b p-4 mb-8 flex justify-between items-center shadow-sm">
        
        <a href="index.php?action=posts" class="font-bold text-xl text-blue-600">
            BLOG MVC
        </a>

        <div class="space-x-4 text-sm font-medium">
            <a href="index.php?action=posts" class="hover:text-blue-500">INICIO</a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="text-gray-400">|</span>
                <span>Hola, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
                <a href="index.php?action=logout" class="text-red-500 hover:text-red-700 ml-2">Salir</a>
            <?php else: ?>
                <span class="text-gray-400">|</span>
                <a href="index.php?action=login" class="hover:text-blue-500">Entrar</a>
                <a href="index.php?action=register" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Registro</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container mx-auto px-4">