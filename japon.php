<?php
$sayfa_basligi = 'Japon Mitolojisi';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'japon';
$body_class    = 'ulke-body';
$header_class  = 'ulke-header';

$yaratiklar = [
    [
        'sinif' => 'Ruh',
        'isim'  => 'Kitsune',
        'ozet'  => 'Şekil değiştirebilen, dokuz kuyruklu tilki ruhu. Hem bilge hem de hilekardır.',
        'link'  => 'kitsune.php',
    ],
    [
        'sinif' => 'İblis',
        'isim'  => 'Kuchisake-onna',
        'ozet'  => 'Sakat bırakılmış ve dünyadan intikam almak için geri dönmüş bir kadının hayaletidir.',
        'link'  => 'kuchisakeonna.php',
    ],
    [
        'sinif' => 'İblis',
        'isim'  => 'Futakuchi-onna',
        'ozet'  => 'Kafatasının arkasında ikinci bir ağız bulunur. Bu ikinci ağız doymak bilmez ve saç benzeri uzun dokunaçlarını kullanarak bulabildiği her türlü yiyeceği tüketir.',
        'link'  => 'futakuchionna.php',
    ],
];

include 'includes/header.php';
?>

    <main class="sayfa-container">
        <div class="sayfa-header">
            <h1>SİSLİ DAĞLARIN ŞEYTANLARI</h1>
            <p>Yokai ve Obakelerin Gizemli Dünyası</p>
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
