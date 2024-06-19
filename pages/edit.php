<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $name_umkm = $_POST['name_umkm'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $m_category_tabs_id = $_POST['m_category_tabs_id'];
    $stmt = $pdo->prepare("UPDATE users_tabs SET name = :name, brand = :name_umkm, address = :address, phone = :phone, m_category_tabs_id = :m_category_tabs_id WHERE email = :email");
    if ($stmt->execute([
            'email' => $email,
            'name' => $name,
            'name_umkm' => $name_umkm,
            'address' => $address,
            'phone' => $phone,
            'm_category_tabs_id' => $m_category_tabs_id,
        ])) {
        header('Location: ./index.php?page=setting');
    } else {
        $error = "Update failed. Please try again.";
    }
} else {
    
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        echo "Invalid item ID.";
        exit;
    }
    $stmt = $pdo->prepare("SELECT id, title FROM m_category_tabs");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Query to select the item by ID
    $stmt = $pdo->prepare("SELECT *, b.title FROM users_tabs a left join m_category_tabs b on a.m_category_tabs_id = b.id WHERE a.id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "Item not found.";
        exit;
    }
}

?>
<main class="main-edit">
    <div class="edit-main">
        <form class="container_form" action="index.php?page=edit&id=<?php echo $id ?>" method="post">
            <h1>Ubah Informasi Akun UMKM</h1>
            <input type="text" id="email" name="email" placeholder="id" style="visibility: hidden; display: none;" required value="<?php echo $user['email'] ?>">
            <input type="text" id="name" name="name" placeholder="Nama pemilik" required value="<?php echo $user['name'] ?>">
            <input type="text" id="name_umkm" name="name_umkm" placeholder="Nama Usaha" required value="<?php echo $user['brand'] ?>">
            <input type="text" id="address" name="address" placeholder="Alamat Usaha" required value="<?php echo $user['address'] ?>">
            <input type="number" id="phone" name="phone" placeholder="Nomor Telephone" required value="<?php echo $user['phone'] ?>">
            <select id="category" name="m_category_tabs_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category['id']); ?>">
                        <?php echo htmlspecialchars($category['title']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <button type="submit" id="btn-auth" style="color: white;">Update Informasi</button>
        </form>
    </div>
</main>