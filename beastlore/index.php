<?php
$sayfa_basligi = 'BeastLore';
$css_dosyasi   = 'style.css';
$aktif_menu    = 'anasayfa';
$body_class    = '';
$header_class  = '';

include 'includes/header.php';
?>

    <section class="mid-container">
        <div class="mid-yazi">
            <span class="mid-ustyazi">Kayıp Kayıtlar No: 042</span>
            <h1>GÖLGE DÜNYANIN SAKİNLERİ</h1>
            <p>Unutulmuş çağların pençe izlerini takip edin. Mitlerin gerçeğe dönüştüğü sınırdayız.</p>
        </div>

        <div class="mid-animasyon">
            <div class="mid-animasyon-grup">
                <div class="mid-animasyon-foto"><img src="anasayfa/1.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/2.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/3.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/4.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/5.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/6.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/7.png" alt=""></div>
            </div>
            <div aria-hidden class="mid-animasyon-grup">
                <div class="mid-animasyon-foto"><img src="anasayfa/1.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/2.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/3.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/4.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/5.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/6.png" alt=""></div>
                <div class="mid-animasyon-foto"><img src="anasayfa/7.png" alt=""></div>
            </div>
        </div>
    </section>

    <main class="kesfet-container">
        <div class="kesfet-baslik">
            <h2>KEŞFET</h2>
        </div>

        <?php
        
        $one_cikan = [
            [
                'sinif'   => 'Ruh',
                'isim'    => 'Kitsune: Dokuz Kuyruklu Tilki',
                'ozet'    => 'Şekil değiştirebilen, dokuz kuyruklu tilki ruhu. Hem bilge hem de hilekardır.',
                'link'    => 'kitsune.php',
                'featured'=> false,
            ],
            [
                'sinif'   => 'Kanatlı',
                'isim'    => 'Hüma Kuşu: Cennetin Habercisi',
                'ozet'    => 'Yedi kat gökler üzerinde uçup Tanrıdan haber getiren kuş...',
                'link'    => 'huma.php',
                'featured'=> true,
            ],
            [
                'sinif'   => 'Yeraltı',
                'isim'    => 'Kerberos: Kapı Muhafızı',
                'ozet'    => 'Hades\'in sadık, üç başlı dostu. Ruhların dünyasından çıkışın tek ve en büyük engeli...',
                'link'    => 'kerberos.php',
                'featured'=> false,
            ],
        ];
        ?>

        <section class="mit-container">
            <?php foreach ($one_cikan as $yaratik): ?>
                <article class="mit-kart<?php if ($yaratik['featured']) echo ' featured'; ?>">
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
