<?php


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo "Invalid item ID.";
    exit;
}

// Query to select the item by ID
$stmt = $pdo->prepare("SELECT *, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id WHERE a.id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Item not found.";
    exit;
}

?>
<main id="detail_page">
        <p class="title"><?php echo htmlspecialchars($user['brand']); ?></p>
        <div class="data-list">
            <div id="item">
                <img src="assets/images/img_store.png" alt="img">
                <div class="title" id="titles">
                    <div>
                        <p><?php echo htmlspecialchars($user['brand']); ?></p>
                        <p><?php echo htmlspecialchars($user['title']); ?></p>
                    </div>
                    <div class="block-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($i < $user['rating']): ?>
                                <span class="rating">&#9733;</span>
                            <?php else: ?>
                                <span class="rating">&#9734;</span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="informasi">
                <p>Toko Makanan adalah destinasi favorit untuk menemukan beragam makanan dan minuman yang lezat di Tanjungpinang. Dengan berbagai pilihan makanan tradisional dan minuman segar, kami menawarkan pengalaman belanja yang memuaskan bagi pelanggan kami. Dapatkan cita rasa autentik dan kualitas terbaik di setiap kunjungan Anda ke Toko Makanan</p>
                <div class="block">
                    <p class="section">Waktu Operasional</p>
                    <p>Setiap hari: 08:00-00:00 WIB.</p>
                </div>
                <div class="block">
                    <p class="section">Lokasi</p>
                    <p><?php echo htmlspecialchars($user['address']); ?></p>
                </div>
            </div>
        </div>
</main>