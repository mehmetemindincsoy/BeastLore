<?php
$istenen_id = $_GET['id'] ?? '';
$secili_yaratik = null;

if (file_exists('yaratiklar.json')) {
    $yaratiklar = json_decode(file_get_contents('yaratiklar.json'), true);
    if (is_array($yaratiklar)) {
        foreach ($yaratiklar as $yaratik) {
            if (isset($yaratik['id']) && $yaratik['id'] == $istenen_id) {
                $secili_yaratik = $yaratik;
                break;
            }
        }
    }
}

if (!$secili_yaratik) {
    die('<div style="text-align:center; padding: 100px; color: var(--gold); font-family: \'Cinzel\', serif; font-size: 2rem; background: var(--dark-bg); height: 100vh;">Parşömen bulunamadı veya silinmiş.</div>');
}

$sayfa_basligi = $secili_yaratik['isim'];
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = $secili_yaratik['ulke'];
$body_class    = 'dinamik-arkaplan';
$header_class  = '';

include 'includes/header.php';
?>
<style>
.dinamik-arkaplan {
    color: var(--text-color);
    font-family: 'Lora', serif; 
    line-height: 1.8; 
    overflow-x: hidden; 
    background-image: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('<?php echo htmlspecialchars($secili_yaratik['foto']); ?>'); /* [cite: 6] */
    background-size: cover; 
    background-position: center; 
    background-attachment: scroll; 
}
</style>

<main class="sayfa-container">
    <div class="sayfa-header">
        <h1><?php echo htmlspecialchars($secili_yaratik['isim']); ?></h1>
        <p style="text-transform: uppercase; letter-spacing: 3px; color: #888;">Sınıf: <?php echo htmlspecialchars($secili_yaratik['sinif']); ?></p>
    </div>

    <section class="paragraf">
        <p class="buyuk-harf"><?php echo mb_substr(htmlspecialchars($secili_yaratik['hikaye']), 0, 1, 'UTF-8'); ?></p>
        <p><?php echo nl2br(htmlspecialchars(mb_substr($secili_yaratik['hikaye'], 1, null, 'UTF-8'))); ?></p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>