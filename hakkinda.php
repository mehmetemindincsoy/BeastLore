<?php
$sayfa_basligi = 'Hakkında';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'hakkinda';
$body_class    = 'ulke-body';
$header_class  = 'hakkinda-header';

// Form
$basari_mesaji = '';
$hata_mesaji   = '';
$email_deger   = '';
$mesaj_deger   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $mesaj = trim($_POST['mesaj'] ?? '');

    $email_deger = htmlspecialchars($email);
    $mesaj_deger = htmlspecialchars($mesaj);

    if (empty($email) || empty($mesaj)) {
        $hata_mesaji = 'Lütfen tüm alanları doldurun.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hata_mesaji = 'Geçerli bir e-posta adresi girin.';
    } elseif (strlen($mesaj) < 10) {
        $hata_mesaji = 'Öneriniz çok kısa. Lütfen daha fazla detay ekleyin.';
    } else {

        $yeni_oneri = [
            'email' => $email,
            'mesaj' => $mesaj,
            'tarih' => date('d.m.Y H:i'),
        ];

        $dosya_yolu = 'oneriler.json';


        if (file_exists($dosya_yolu)) {
            $mevcut = json_decode(file_get_contents($dosya_yolu), true);
            if (!is_array($mevcut)) $mevcut = [];
        } else {
            $mevcut = [];
        }

        $mevcut[] = $yeni_oneri;
        file_put_contents($dosya_yolu, json_encode($mevcut, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $basari_mesaji = 'Parşömeniniz mühürlendi! Öneriniz arşive eklendi.';

        $email_deger = '';
        $mesaj_deger = '';
    }
}

include 'includes/header.php';
?>

    <main class="sayfa-container">
        <div class="sayfa-header">
            <h1>ARŞİVİN HİKAYESİ</h1>
            <p>"Geçmiş, sadece hatırladığımız kadar gerçektir."</p>
        </div>

        <section class="paragraf">
            <p class="buyuk-harf">B</p>
            <p>eastLore, kültürlerin en derin korkularını ve en büyük umutlarını simgeleyen mitolojik varlıkları bir araya getiren dijital bir kütüphanedir. Orta Asya'nın bozkırlarından Japonya'nın sisli dağlarına, Olympos'un zirvelerinden yeraltı dünyasına kadar uzanan bir yolculuk.</p>
            <p>Bu site, sadece canavarları değil, onları yaratan toplumların inançlarını, korkularını ve hayallerini de incelemek için tasarlandı.</p>
        </section>
    </main>

    <section class="oneri-container">
        <div class="kart-kenar form-alani">
            <span class="mit-sinif">İletişim Arşivi</span>
            <h3>İSTEK VE ÖNERİLER</h3>
            <p>Arşivlerimizi genişletmemize yardımcı olun. Mitolojik bir eksik veya geliştirme öneriniz varsa bize yazın.</p>

            <?php if ($basari_mesaji): ?>
                <div class="form-mesaj form-basari">
                    ✔ <?php echo $basari_mesaji; ?>
                </div>
            <?php endif; ?>

            <?php if ($hata_mesaji): ?>
                <div class="form-mesaj form-hata">
                    ✖ <?php echo $hata_mesaji; ?>
                </div>
            <?php endif; ?>

            <form action="hakkinda.php" method="POST" class="mit-form">
                <div class="input-grubu">
                    <input
                        type="email"
                        name="email"
                        placeholder="E-posta Adresi"
                        value="<?php echo $email_deger; ?>"
                        required
                    >
                </div>
                <div class="input-grubu">
                    <textarea
                        name="mesaj"
                        placeholder="Öneriniz veya eklenmesini istediğiniz mitolojik hikayeleri burada belirtebilirsiniz."
                        rows="5"
                        required
                    ><?php echo $mesaj_deger; ?></textarea>
                </div>
                <button type="submit" class="muhur-btn">PARŞÖMENİ MÜHÜRLE</button>
            </form>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
