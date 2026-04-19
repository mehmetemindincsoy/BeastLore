<?php
$sayfa_basligi = 'Yunan Mitolojisi';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'yunan';
$body_class    = 'ulke-body';
$header_class  = 'ulke-header';


$yaratiklar = [
    [
        'sinif' => 'Lanetli',
        'isim'  => 'Medusa',
        'ozet'  => 'Saçları yılandan oluşan, gözlerine bakanı taşa çeviren Gorgon kız kardeşi.',
        'link'  => 'medusa.php',
    ],
    [
        'sinif' => 'Kanatlı',
        'isim'  => 'Pegasus',
        'ozet'  => 'Yunan mitolojisindeki deniz tanrısı Poseidon ile yılan saçlı Gorgon Medusa\'nın oğludur. Perseus tarafından başı kesilerek öldürülen Medusa\'nın gövdesinden doğduğu anlatılır.',
        'link'  => 'pegasus.php',
    ],
    [
        'sinif' => 'Yeraltı',
        'isim'  => 'Kerberos',
        'ozet'  => 'Hades\'in yönettiği ölülerin bulunduğu yeraltının kapısında bekçilik yapan üç başlı bir köpek.',
        'link'  => 'kerberos.php',
    ],
];

include 'includes/header.php';
?>

    <main class="sayfa-container">
        <div class="sayfa-header">
            <h1>OLYMPOS VE ÖTESİ</h1>
            <p>Tanrılar, Kahramanlar ve Canavarlar</p>
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