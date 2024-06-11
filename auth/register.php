<?php
require '../service/connection.php';

session_start();
if(isset($_SESSION['user_id'])){
    header('Location: ../index.php');
}
$stmt = $pdo->prepare("SELECT id, title FROM m_category_tabs");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $confirm_password = $_POST['confirm_password'];
    $name_umkm = $_POST['name_umkm'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $m_category_tabs_id = $_POST['m_category_tabs_id'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Cek apakah name atau email sudah ada
    $stmt = $pdo->prepare("SELECT * FROM users_tabs WHERE name = ? OR email = ?");
    $stmt->execute([$name, $email]);
    $user = $stmt->fetch();

    if ($user) {
        $error = "Name atau Email sudah digunakan.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users_tabs (name, email, password, brand, address, phone, m_category_tabs_id) VALUES (?,?,?,?,?,?,?)");
        if ($stmt->execute([$name, $email, $password,$name_umkm,$address,$phone,$m_category_tabs_id])) {
            header('Location: ./login.php');
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
    <script src="../assets/js/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <main class="main">
        <img src="../assets/images/login_image.png" alt="login">
        <form class="container_form" action="register.php" method="post">
            <h1>Daftar Akun UMKM</h1>
            <input type="text" id="name" name="name" placeholder="Nama pemilik" required>
            <input type="text" id="email" name="email" placeholder="email" required>
            <input type="password" id="password" name="password" placeholder="password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="konfirmasi password" required>
            <input type="text" id="name_umkm" name="name_umkm" placeholder="Nama Usaha" required>
            <input type="text" id="address" name="address" placeholder="Alamat Usaha" required>
            <input type="number" id="phone" name="phone" placeholder="Nomor Telephone" required>
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
            <button type="submit" id="btn-auth">Daftar</button>
            <p>Sudah mempunyai akun ? <a href="./login.php">Login Sekarang</a> </p>
        </form>
    </main>
</body>
</html>
