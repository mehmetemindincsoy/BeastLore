# BeastLore

BeastLore, dünyanın farklı kültürlerine ait mitolojik varlıkları bir araya getiren **PHP tabanlı dijital bir kütüphanedir**. Orta Asya'nın bozkırlarından Japonya'nın sisli dağlarına, Olympos'un zirvelerinden yeraltı dünyasına uzanan bu arşiv; canavarları değil, onları yaratan toplumların inançlarını, korkularını ve hayallerini de incelemeyi amaçlar.

---

## Proje Hakkında

Bu projede amacımız; PHP, HTML ve CSS kullanarak dinamik, çok sayfalı, içerik yönetim sistemine (CMS) sahip ve gerçek bir kullanıcı deneyimi sunan bir web sitesi geliştirmek.

---

## Sayfa Yapısı ve Özellikler

| Sayfa | Açıklama |
|---|---|
| `index.php` | Ana sayfa ve öne çıkan varlıklar |
| `yunan.php` | Yunan mitolojisi varlıkları (Dinamik listeleme) |
| `turk.php` | Türk mitolojisi varlıkları (Dinamik listeleme) |
| `japon.php` | Japon mitolojisi varlıkları (Dinamik listeleme) |
| `hakkinda.php` | Site hakkında bilgi ve öneri gönderme formu |
| `arama.php` | Arşiv içi dinamik arama motoru |
| `yonetim.php` | Şifre korumalı içerik yönetim paneli (Varlık ekleme/silme, görsel yükleme) |
| `parsomen.php` | Seçilen varlığın detaylı hikayesinin gösterildiği dinamik sayfa |

---

## Kullanılan Teknolojiler

| Teknoloji | Kullanım Amacı |
|---|---|
| PHP 8+ | Sunucu taraflı dinamik içerik, form işleme, dosya yükleme ve oturum yönetimi |
| HTML5 | Sayfa yapısı |
| CSS3 | Tasarım ve animasyonlar |
| JSON | Öneri mesajları (`oneriler.json`) ve dinamik içerik verilerinin (`yaratiklar.json`) saklanması |
| Google Fonts | Cinzel & Lora yazı tipleri |

---

## Dosya Yapısı

```text
beastlore/
├── index.php
├── hakkinda.php
├── yunan.php
├── turk.php
├── japon.php
├── arama.php
├── yonetim.php
├── parsomen.php
├── sayfa.css
├── style.css
├── oneriler.json
├── yaratiklar.json
├── includes/
│   ├── header.php
│   └── footer.php
└── medya/
    ├── logo.png
    └── icon.png
```
Kurulum

    Projeyi bilgisayarınıza indirin.

    XAMPP, WAMP veya benzeri bir yerel sunucu kurun.

    Proje klasörünü htdocs (XAMPP) / www (WAMP) içine taşıyın.

    Görsel yükleme işlemlerinin çalışması için medya/ klasörüne ve JSON dosyalarına yazma izni verdiğinizden emin olun.

    Tarayıcıdan http://localhost/beastlore/ adresine gidin.

Geliştiriciler
İsim	Öğrenci No
Ezgi Boztepe	33253304003
Mehmet Emin Dinçsoy	33253304001
