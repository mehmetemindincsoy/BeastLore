<?php
if (!isset($css_dosyasi))  $css_dosyasi  = 'sayfa.css';
if (!isset($aktif_menu))   $aktif_menu   = '';
if (!isset($body_class))   $body_class   = '';
if (!isset($header_class)) $header_class = '';
if (!isset($sayfa_basligi)) $sayfa_basligi = 'BeastLore';

if ($sayfa_basligi === 'BeastLore') {
    $baslik = 'BeastLore';
} else {
    $baslik = $sayfa_basligi . ' | BeastLore';
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=3.0, user-scalable=yes">
    <link rel="icon" type="image/png" href="medya/icon.png">
    <title><?php echo $baslik; ?></title>
    <link rel="stylesheet" href="<?php echo $css_dosyasi; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Lora:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body<?php if ($body_class) echo ' class="' . $body_class . '"'; ?>>

<header<?php if ($header_class) echo ' class="' . $header_class . '"'; ?>>
    <div class="nav-container">
        <a class="logo" href="index.php"><img src="medya/logo.png" alt="BeastLore"></a>
        <nav>
            <ul>
                <li><a href="index.php"    <?php if ($aktif_menu === 'anasayfa') echo 'class="active"'; ?>>Ana Sayfa</a></li>
                <li><a href="yunan.php"    <?php if ($aktif_menu === 'yunan')    echo 'class="active"'; ?>>Yunan Mitolojisi</a></li>
                <li><a href="turk.php"     <?php if ($aktif_menu === 'turk')     echo 'class="active"'; ?>>Türk Mitolojisi</a></li>
                <li><a href="japon.php"    <?php if ($aktif_menu === 'japon')    echo 'class="active"'; ?>>Japon Mitolojisi</a></li>
                <li><a href="hakkinda.php" <?php if ($aktif_menu === 'hakkinda') echo 'class="active"'; ?>>Hakkında</a></li>
            </ul>
        </nav>
    </div>
</header>