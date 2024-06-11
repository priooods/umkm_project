<main id="news">
    <p class="title">Berita Seputar UMKM</p>
    <div class="data-list">
        <img src="assets/images/news1.png" alt="img">
        <div class="informasi">
            <p class="title">Toko  Batik Sekar </p>
            <p>Batik Sekar Jagad, UMKM batik asal Yogyakarta, menghadirkan keindahan batik tulis dan cap dengan desain unik dan kualitas tinggi. Produknya telah menembus pasar internasional, menghiasi pecinta baim di Jepang, Amerika dan Eropa. </p>
            <li id="button" data-id="<?php echo htmlspecialchars($item['id']); ?>">
                <span>Selengkapnya</span>
                <img src="assets/images/arrow-right-circle.png" alt="arrow">
            </li>
        </div>
    </div>
    <div class="data-list">
        <img src="assets/images/news2.png" alt="img">
        <div class="informasi">
            <p class="title">Toko  Batik Sekar </p>
            <p>Batik Sekar Jagad, UMKM batik asal Yogyakarta, menghadirkan keindahan batik tulis dan cap dengan desain unik dan kualitas tinggi. Produknya telah menembus pasar internasional, menghiasi pecinta baim di Jepang, Amerika dan Eropa. </p>
            <li id="button" data-id="<?php echo htmlspecialchars($item['id']); ?>">
                <span>Selengkapnya</span>
                <img src="assets/images/arrow-right-circle.png" alt="arrow">
            </li>
        </div>
    </div>
</main>
<script>
document.querySelectorAll('li[data-id]').forEach(item => {
    item.addEventListener('click', () => {
        console.log("disini");
        const id = item.getAttribute('data-id');
        window.location.href = `index.php?page=detailnews&id=${id}`;
    });
});
</script>