# BeastLore

BeastLore, dünyanın farklı kültürlerine ait mitolojik varlıkları bir araya getiren **PHP tabanlı dijital bir kütüphanedir**. Orta Asya'nın bozkırlarından Japonya'nın sisli dağlarına, Olympos'un zirvelerinden yeraltı dünyasına uzanan bu arşiv; canavarları değil, onları yaratan toplumların inançlarını, korkularını ve hayallerini de incelemeyi amaçlar.

---

## 📌 Proje Hakkında

Bu proje, lise düzeyinde bir web tasarımı dersi kapsamında geliştirilmiştir. Amacımız; PHP, HTML ve CSS kullanarak dinamik, çok sayfalı ve gerçek bir kullanıcı deneyimi sunan bir web sitesi oluşturmaktı. Tasarım dili olarak parşömen, arşiv ve antik kütüphane estetiği benimsenmiştir.

---

## 🗂️ Sayfa Yapısı

| Sayfa | Açıklama |
|---|---|
| `index.php` | Ana sayfa |
| `yunan.php` | Yunan mitolojisi varlıkları |
| `turk.php` | Türk mitolojisi varlıkları |
| `japon.php` | Japon mitolojisi varlıkları |
| `hakkinda.php` | Site hakkında bilgi ve form |
| `includes/header.php` | Tüm sayfalarda ortak kullanılan üst şablon |
| `includes/footer.php` | Tüm sayfalarda ortak kullanılan alt şablon |

---

## ⚙️ Teknik Özellikler

### Şablon Sistemi (include)
Tüm sayfalar `includes/header.php` ve `includes/footer.php` dosyalarını `include` ile çağırır. Bu sayede navigasyon menüsü, font bağlantıları ve favicon gibi tekrarlayan öğeler **tek bir dosyadan** yönetilir. DRY (Don't Repeat Yourself) prensibine uygun bir yapıdır.

Her sayfa, `header.php` çağrılmadan önce kendi değişkenlerini tanımlar:

```php
$sayfa_basligi = 'Hakkında';
$css_dosyasi   = 'sayfa.css';
$aktif_menu    = 'hakkinda';
$body_class    = 'ulke-body';
$header_class  = 'hakkinda-header';
```

`header.php` bu değişkenleri okur; tanımlanmamışsa `isset()` kontrolüyle güvenli varsayılan değerler atar.

---

### Dinamik Sekme Başlığı
```php
if ($sayfa_basligi === 'BeastLore') {
    $baslik = 'BeastLore';
} else {
    $baslik = $sayfa_basligi . ' | BeastLore';
}
```
Ana sayfada yalnızca **"BeastLore"**, diğer sayfalarda **"Hakkında | BeastLore"** gibi anlamlı sekme başlıkları üretilir.

---

### Aktif Menü Vurgulama
Kullanıcının hangi sayfada olduğu navigasyonda otomatik olarak vurgulanır:

```php
<a href="hakkinda.php"
   <?php if ($aktif_menu === 'hakkinda') echo 'class="active"'; ?>>
   Hakkında
</a>
```

---

### Dinamik Kart Sistemi
Ana sayfadaki yaratık kartları, bir PHP dizisinden döngüyle üretilir. `featured: true` olan kart, CSS sınıfı aracılığıyla görsel olarak öne çıkarılır:

```php
foreach ($one_cikan as $yaratik):
    // Her yaratık için otomatik HTML kartı üretilir
endforeach;
```

---

### Öneri Formu ve JSON Kaydı
`hakkinda.php` sayfasında kullanıcıların öneri gönderebildiği bir form bulunur. Form gönderildiğinde:

1. `POST` isteği kontrol edilir
2. Veriler `htmlspecialchars()` ile XSS saldırılarına karşı temizlenir
3. `filter_var()` ile e-posta doğrulaması yapılır
4. `strlen()` ile mesaj uzunluğu kontrol edilir
5. Tüm doğrulamalar geçilirse öneri `oneriler.json` dosyasına eklenir

```php
file_put_contents($dosya_yolu, json_encode($mevcut,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
```

`JSON_UNESCAPED_UNICODE` sayesinde Türkçe karakterler bozulmadan kaydedilir.

---

## 🔒 Güvenlik Önlemleri

- **XSS Koruması:** Kullanıcıdan gelen tüm veriler `htmlspecialchars()` ile işlenir
- **Boş Alan Kontrolü:** `empty()` ile zorunlu alanlar kontrol edilir
- **E-posta Doğrulaması:** `filter_var($email, FILTER_VALIDATE_EMAIL)` kullanılır
- **Uzunluk Kontrolü:** `strlen()` ile minimum karakter sayısı zorunlu tutulur
- **Bozuk JSON Koruması:** `is_array()` kontrolü ile JSON dosyası bozuksa sistem çökmez

---

## 🛠️ Kullanılan Teknolojiler

| Teknoloji | Kullanım Amacı |
|---|---|
| PHP 8+ | Sunucu taraflı dinamik içerik |
| HTML5 | Sayfa yapısı |
| CSS3 | Tasarım ve animasyonlar |
| JSON | Öneri verilerinin saklanması |
| Google Fonts | Cinzel & Lora yazı tipleri |

---

## 📁 Dosya Yapısı

```
beastlore/
├── index.php
├── hakkinda.php
├── yunan.php
├── turk.php
├── japon.php
├── sayfa.css
├── oneriler.json
├── includes/
│   ├── header.php
│   └── footer.php
└── medya/
    ├── logo.png
    └── icon.png
```

---

## 🚀 Kurulum

1. Projeyi bilgisayarınıza indirin
2. XAMPP, WAMP veya benzeri bir yerel sunucu kurun
3. Proje klasörünü `htdocs` (XAMPP) içine taşıyın
4. Tarayıcıdan `http://localhost/beastlore/` adresine gidin

---

## 👤 Geliştiriciler

| İsim | Öğrenci No |
|---|---|
| Ezgi Boztepe | 33253304003 |
| Mehmet Emin Dinçsoy | 33253304001 |


---

