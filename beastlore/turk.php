<?php
$sayfa_basligi = 'Türk Mitolojisi';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'turk';
$body_class    = 'ulke-body';
$header_class  = 'ulke-header';

$yaratiklar = [
    [
        'sinif' => 'Kanatlı',
        'isim'  => 'Hüma Kuşu',
        'ozet'  => 'Yedi kat gökler üzerinde uçup Tanrıdan haber getiren kuş olarak bilinir...',
        'link'  => 'huma.php',
    ],
    [
        'sinif' => 'Karanlık',
        'isim'  => 'Erlik Han',
        'ozet'  => 'Yeraltı dünyasının efendisi. Kötülüğün, hastalığın ve ölümün kaynağı olarak bilinir.',
        'link'  => 'erlik.php',
    ],
    [
        'sinif' => 'Cin',
        'isim'  => 'Arçura',
        'ozet'  => 'Kaşla göz arasında ak sakallı bir adam, yakışıklı bir genç. İnsanları gıdıklamak suretiyle gülmekten çatlatarak öldürdüğü söyleniyor.',
        'link'  => 'arcura.php',
    ],
];

include 'includes/header.php';
?>

    <main class="sayfa-container">
        <div class="sayfa-header">
            <h1>BOZKIRIN RUHLARI</h1>
            <p>Gök Tengri'den Yeraltı'na Türk Söylenceleri</p>
        </div>

        <section class="mit-container">
            <?php foreach ($yaratiklar as $yaratik): ?>
                <article class="mit-kart">
                    <div class="kart-kenar">
                        <span class="mit-sinif">Sınıf: <?php echo $yaratik['sinif']; ?></span>
                        <h3><?php echo $yaratik['isim']; ?></h3>
                        <p><?php echo $yaratik['ozet']; ?></p>
                        <a href="<?php echo $yaratik['link']; ?>" class="parsomen-buton">Parşömeni Aç</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
