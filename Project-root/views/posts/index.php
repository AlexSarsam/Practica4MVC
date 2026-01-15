<?php include __DIR__ . '/../layout/header.php'; ?>

<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    
    <h1 class="text-3xl font-bold mb-8">Publicaciones del Blog</h1>
    
    <?php if (empty($posts)): ?>
        <p>No hay publicaciones disponibles.</p>
    <?php else: ?>
        
        <?php foreach ($posts as $post): ?>
            
            <div style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px;">
                <h2 class="text-xl font-bold">
                    <?= htmlspecialchars($post['title']) ?>
                </h2>
                
                <p style="color: #666; margin: 10px 0;">
                    <?= htmlspecialchars(substr($post['content'], 0, 150)) ?>
                </p>
                
            </div>

        <?php endforeach; ?>
        
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>