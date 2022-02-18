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
                <div class="uk-width-1-3@m">
                    <div class="uk-visible@m" data-uk-sticky="offset: 140; bottom: true">
                        <div>
                            <h3 class="uk-margin-small-bottom">Kategori</h3>
                            <ul class="uk-nav uk-nav-default">
                                <?php foreach ($faq as $data) : ?>
                                    <li><a href="
                                    <?php
                                    $id = $data['category_id'];
                                    $encrypt = (($id * 123678 * 312) / 7536);
                                    $link = urlencode(base64_encode($encrypt));
                                    echo base_url('Landing/detail_consultation_category/') . $link;
                                    ?>"><?= $data['category_name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-expand@m">
                    <ul class="uk-breadcrumb uk-margin-bottom uk-text-500">
                        <li><a href="<?= base_url('Faq'); ?>"><?php $segment_1 = $this->uri->segment(1);
                                                                echo ucwords($string = str_replace('_', ' ', $segment_1)); ?></a></li>
                        <li><a href=""><?php $segment_2 = $this->uri->segment(2);
                                        echo ucwords($string = str_replace('_', ' ', $segment_2)); ?></a></li>
                        <li><span style="color: red;">Data detail FAQ</span></li>
                    </ul>

                    <?php foreach ($faq as $data) : ?>

                        <article class="uk-article">
                            <h1 class="uk-article-title">
                                <?php
                                echo $data['faq_consultation'];
                                ?>
                            </h1>
                            <div class="uk-article-content">
                                <p><?php echo $data['faq_respon']; ?></p>
                                <!-- <a href="#" style="font-size: medium; font-weight:bold">Baca Selengkapnya..</a> -->
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>