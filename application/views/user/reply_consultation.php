<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index | Aplikasi Konsultasi Hukum Kabupaten Minahasa Selatan</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets_user/images/'); ?>logo_minsel.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets_user/'); ?>css/main.css" />
    <script src="<?= base_url('assets_user/'); ?>js/uikit.js"></script>
</head>

<body>

    <div class="uk-navbar-wrapper" data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; 
  cls-active: uk-navbar-sticky; top: 400; media: @m">
        <nav class="uk-navbar-container">
            <div class="uk-container uk-navbar-transparent uk-light">
                <div data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo uk-visible@m" href="<?= base_url('Landing'); ?>">Konsultasi Hukum</a>
                    </div>
                    <div class="uk-navbar-center uk-hidden@m">
                        <a class="uk-navbar-item uk-logo" href="<?= base_url('Landing'); ?>">Konsultasi Hukum</a>
                    </div>
                    <div class="uk-navbar-right">
                        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="<?= base_url('Landing'); ?>">Beranda</a></li>
                            <li><a href="<?= base_url('Faq'); ?>">Faq</a></li>
                            <li class=""><a href="<?= base_url('Article'); ?>">Artikel</a></li>
                            <li>
                                <div class="uk-navbar-item">
                                    <a class="uk-button uk-button-small uk-button-primary-outline" href="<?= base_url('Consultation_form'); ?>">Konsultasi</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="uk-section uk-section-large uk-section-default">
        <div class="uk-container">
            <div data-uk-grid>
                <div class="uk-width-expand@m">
                    Hallo - <b style="font-size: large;"><?php echo $user['user_full_name']; ?></b><br />
                    Ini adalah balasan dari konsultasi anda
                    <hr />
                    <article class="uk-article">
                        <h1 class="uk-article-title"><?= $consultation_title['consultation_text']; ?></h1>
                        <?php foreach ($consultation as $data) : ?>
                            <div class="uk-article-content">
                                <p><?php echo $data['respon_text']; ?></p>
                                <!-- <a href="#" style="font-size: medium; font-weight:bold">Baca Selengkapnya..</a> -->
                            </div>
                    </article>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>