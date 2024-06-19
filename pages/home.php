<?php 
    $stmt = $pdo->prepare("SELECT a.*, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id order by a.id asc limit 3");
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="main">
    <div id="layer-one">
        <div class="title">
            <h1>UMKM-Kita menyediakan informasi seputar UMKM Tanjungpinang</h1>
            <p>Temukan info UMKM, berita terbaru, dan daftar bisnis Anda di sini!</p>
            <button>Telusuri Sekarang</button>
        </div>
    </div>
    <div id="layer-two">
        <h1>Rekomendasi UMKM</h1>
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
        <div class="section">
            <div>
                <img src="assets/images/img_store.png" alt="img">
                <div class="title">
                    <div>
                        <p>Toko Makanan</p>
                        <p>Makanan & Minuman</p>
                    </div>
                    <div class="block-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($i < 4): ?>
                                <span class="rating">&#9733;</span> <!-- Filled star -->
                            <?php else: ?>
                                <span class="rating">&#9734;</span> <!-- Empty star -->
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <button>Kunjungi Toko</button>

            </div>
        </div>
    </div>
</div>