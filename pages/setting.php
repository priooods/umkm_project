<?php

$stmt = $pdo->prepare("SELECT a.*, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id");
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM users_tabs WHERE id = ?");
    $stmt->execute([$id]);
    $stmt->fetch();

    $stmt = $pdo->prepare("SELECT a.*, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id");
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<main id="info">
    <p class="title">Atur UMKM terdaftar</p>
    <?php if (count($user) > 0): ?>
    <ul class="data-list">
        <?php foreach ($user as $item): ?>
        <li>
            <div>
                <div data-id="<?php echo htmlspecialchars($item['id']); ?>">
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
                <div style="display: flex;">
                    <form action="index.php?page=setting" method="post">
                        <input type="text" style="visibility: hidden; display:none;" name="id" value="<?php echo $item['id']; ?>">
                        <button type="submit" style="background-color: red; color: white; margin-top: 10px; " >Hapus</button>
                    </form>
                    <button type="button" style="background-color: green; margin-left: 10px; color: white; margin-top: 10px; " onclick="edit('<?php echo $item['id']; ?>')" >Edit</button>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</main>

<script>
function edit(id){
    window.location.href = `index.php?page=edit&id=${id}`;
}
</script>