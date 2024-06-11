<?php

$stmt = $pdo->prepare("SELECT a.*, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id");
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<main id="info">
    <p class="title">Info UMKM</p>
    <?php if (count($user) > 0): ?>
    <ul class="data-list">
        <?php foreach ($user as $item): ?>
        <li data-id="<?php echo htmlspecialchars($item['id']); ?>">
            <div>
                <img src="assets/images/img_store.png" alt="img">
                <div class="title">
                    <div>
                        <p><?php echo htmlspecialchars($item['brand']); ?></p>
                        <p><?php echo htmlspecialchars($item['title']); ?></p>
                    </div>
                    <div class="block-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($i < $item['rating']): ?>
                                <span class="rating">&#9733;</span> <!-- Filled star -->
                            <?php else: ?>
                                <span class="rating">&#9734;</span> <!-- Empty star -->
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</main>
<script>
document.querySelectorAll('li[data-id]').forEach(item => {
    item.addEventListener('click', () => {
        const id = item.getAttribute('data-id');
        window.location.href = `index.php?page=detail&id=${id}`;
    });
});
</script>