<?php
session_start();

$dogru_sifre = '1234';
$hata_mesaji = '';
$basari_mesaji = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['giris_sifre'])) {
    if ($_POST['giris_sifre'] === $dogru_sifre) {
        $_SESSION['oturum'] = true;
        header('Location: yonetim.php');
        exit;
    } else {
        $hata_mesaji = 'Şifre hatalı!';
    }
}

if (isset($_GET['cikis'])) {
    session_destroy();
    header('Location: yonetim.php');
    exit;
}

$sayfa_basligi = 'Yönetim Paneli';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'yonetim';
$body_class    = 'ulke-body';
$header_class  = 'hakkinda-header';

$dosya_yolu = 'yaratiklar.json';
$yaratiklar = [];

if (file_exists($dosya_yolu)) {
    $yaratiklar = json_decode(file_get_contents($dosya_yolu), true);
    if (!is_array($yaratiklar)) $yaratiklar = [];
}

if (isset($_SESSION['oturum'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['yaratik_ekle'])) {
        $isim   = trim($_POST['isim'] ?? '');
        $sinif  = trim($_POST['sinif'] ?? '');
        $ozet   = trim($_POST['ozet'] ?? '');
        $hikaye = trim($_POST['hikaye'] ?? '');
        $ulke   = trim($_POST['ulke'] ?? '');
        
        if (!empty($isim) && !empty($sinif) && !empty($ozet) && !empty($ulke) && !empty($hikaye)) {
            $foto_yolu = 'medya/default.png';
            $benzersiz_id = time(); // Dinamik sayfa için ID
            
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $dosya_adi = time() . '_' . basename($_FILES['foto']['name']);
                $hedef_klasor = 'medya/';
                if (!is_dir($hedef_klasor)) {
                    mkdir($hedef_klasor, 0777, true);
                }
                $hedef_yol = $hedef_klasor . $dosya_adi;
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $hedef_yol)) {
                    $foto_yolu = $hedef_yol;
                }
            }
            
            $yaratiklar[] = [
                'id'     => $benzersiz_id,
                'isim'   => $isim,
                'sinif'  => $sinif,
                'ozet'   => $ozet,
                'hikaye' => $hikaye,
                'foto'   => $foto_yolu,
                'ulke'   => $ulke,
                'link'   => 'parsomen.php?id=' . $benzersiz_id
            ];
            
            file_put_contents($dosya_yolu, json_encode($yaratiklar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $basari_mesaji = 'Yeni efsanevi varlık arşive kaydedildi!';
        } else {
            $hata_mesaji = 'Lütfen tüm alanları doldurun.';
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sil_id'])) {
        $id = (int)$_POST['sil_id'];
        if (isset($yaratiklar[$id])) {
            if ($yaratiklar[$id]['foto'] !== 'medya/default.png' && file_exists($yaratiklar[$id]['foto'])) {
                @unlink($yaratiklar[$id]['foto']);
            }
            unset($yaratiklar[$id]);
            $yaratiklar = array_values($yaratiklar);
            file_put_contents($dosya_yolu, json_encode($yaratiklar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header('Location: yonetim.php');
            exit;
        }
    }
}

include 'includes/header.php';
?>

<main class="sayfa-container">
    <?php if (!isset($_SESSION['oturum'])): ?>
        <div class="sayfa-header">
            <h1>GİRİŞ KONTROLÜ</h1>
            <p>İçerik yönetim paneline erişmek için panel şifresini giriniz.</p>
        </div>
        <section class="oneri-container">
            <div class="kart-kenar form-alani">
                <form action="yonetim.php" method="POST" class="mit-form">
                    <?php if ($hata_mesaji): ?>
                        <div class="form-mesaj form-hata">✖ <?php echo $hata_mesaji; ?></div>
                    <?php endif; ?>
                    <div class="input-grubu">
                        <input type="password" name="giris_sifre" placeholder="Mühür Şifresi" required>
                    </div>
                    <button type="submit" class="muhur-btn">MÜHÜRÜ AÇ</button>
                </form>
            </div>
        </section>
    <?php else: ?>
        <div class="sayfa-header">
            <h1>ARŞİV YÖNETİMİ</h1>
        </div>

        <section class="oneri-container" style="margin-bottom: 60px;">
            <div class="kart-kenar form-alani">
                <span class="mit-sinif">Yeni Parşömen</span>
                <h3>ARŞİVE EKLE</h3>
                
                <?php if ($basari_mesaji): ?>
                    <div class="form-mesaj form-basari">✔ <?php echo $basari_mesaji; ?></div>
                <?php endif; ?>
                <?php if ($hata_mesaji): ?>
                    <div class="form-mesaj form-hata">✖ <?php echo $hata_mesaji; ?></div>
                <?php endif; ?>

                <form action="yonetim.php" method="POST" enctype="multipart/form-data" class="mit-form">
                    <input type="hidden" name="yaratik_ekle" value="1">
                    
                    <div class="input-grubu">
                        <select name="ulke" required style="width: 100%; padding: 15px; background: #0d0d0d; border: 1px solid rgba(197, 160, 89, 0.3); color: var(--text-color); font-family: 'Lora', serif; font-size: 1rem; outline: none;">
                            <option value="" disabled selected>Ait Olduğu Mitoloji / Ülke</option>
                            <option value="japon">Japon Mitolojisi</option>
                            <option value="turk">Türk Mitolojisi</option>
                            <option value="yunan">Yunan Mitolojisi</option>
                        </select>
                    </div>

                    <div class="input-grubu">
                        <input type="text" name="isim" placeholder="Varlık Adı" required>
                    </div>
                    <div class="input-grubu">
                        <input type="text" name="sinif" placeholder="Varlık Sınıfı" required>
                    </div>
                    <div class="input-grubu">
                        <textarea name="ozet" placeholder="Özet" rows="2" required></textarea>
                    </div>
                    <div class="input-grubu">
                        <textarea name="hikaye" placeholder="Hikaye" rows="6" required></textarea>
                    </div>
                    <div class="input-grubu" style="text-align: left; color: #666;">
                        <label style="display:block; margin-bottom: 5px; font-family:'Cinzel'; color:var(--gold); font-size:0.8rem;">Görsel:</label>
                        <input type="file" name="foto" accept="image/*" style="border: none; padding: 5px 0;">
                    </div>
                    <button type="submit" class="muhur-btn">YARATIĞI MÜHÜRLE VE EKLE</button>
                </form>
            </div>
        </section>

        <section class="oneri-container" style="max-width: 1000px;">
            <div class="kart-kenar" style="text-align: left;">
                <span class="mit-sinif">Arşivdeki Mevcut Varlıklar</span>
                <table style="width: 100%; margin-top: 20px; border-collapse: collapse; color: var(--text-color); font-family: 'Lora', serif;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--gold); color: var(--gold); font-family: 'Cinzel', serif; text-align: left;">
                            <th style="padding: 10px;">Görsel</th>
                            <th style="padding: 10px;">Mitoloji</th>
                            <th style="padding: 10px;">Varlık Adı</th>
                            <th style="padding: 10px;">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($yaratiklar)): ?>
                            <tr>
                                <td colspan="4" style="padding: 20px; text-align: center; color: #666;">Arşivde dinamik eklenmiş varlık bulunmuyor.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($yaratiklar as $index => $yaratik): ?>
                                <tr style="border-bottom: 1px solid rgba(197, 160, 89, 0.2);">
                                    <td style="padding: 15px;"><img src="<?php echo htmlspecialchars($yaratik['foto']); ?>" style="width: 50px; height: 60px; object-fit: cover; border: 1px solid var(--gold);"></td>
                                    <td style="padding: 15px; font-size: 0.95rem; text-transform: uppercase; font-family: 'Cinzel'; color: #888;"><?php echo htmlspecialchars($yaratik['ulke'] ?? 'Belirtilmedi'); ?></td>
                                    <td style="padding: 15px; font-size: 0.95rem; font-weight: bold;"><?php echo htmlspecialchars($yaratik['isim']); ?></td>
                                    <td style="padding: 15px;">
                                        <form action="yonetim.php" method="POST" onsubmit="return confirm('Bu varlığı arşivden silmek istediğinize emin misiniz?');">
                                            <input type="hidden" name="sil_id" value="<?php echo $index; ?>">
                                            <button type="submit" style="background: transparent; color: #f0a0a0; border: 1px solid #f0a0a0; padding: 5px 10px; cursor: pointer; font-family: 'Cinzel', serif; font-size: 0.75rem; transition: 0.3s;">SİL</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>