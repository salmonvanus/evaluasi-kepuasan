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
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
                            <li class="uk-active"><a href="<?= base_url('Article'); ?>">Artikel</a></li>
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
                            <h3 class="uk-margin-small-bottom">Daftar Artikel</h3>
                            <ul class="uk-nav uk-nav-default">
                                <?php foreach ($article_side_bar as $data) : ?>
                                    <li><a href="
                                    <?php $id = $data['article_id'];
                                    $encrypt = (($id * 123678 * 312) / 7536);
                                    $link = urlencode(base64_encode($encrypt));
                                    echo base_url('Article/detail_article/') . $link; ?>
                                                    "><?= $data['article_title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <br /> <br />
                        <div>
                            <h3 class="uk-margin-small-bottom">Artikel Populer</h3>
                            <ul class="uk-nav uk-nav-default">
                                <?php foreach ($article_populer as $data) : ?>
                                    <li><a href="
                                    <?php
                                    $id = $data['article_id'];
                                    $encrypt = (($id * 123678 * 312) / 7536);
                                    $link = urlencode(base64_encode($encrypt));
                                    echo base_url('Article/detail_article/') . $link; ?>"><?= $data['article_title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-expand@m">
                    <ul class="uk-breadcrumb uk-margin-bottom uk-text-500">
                        <li><a href="<?= base_url('Article'); ?>">
                                <?php $segment_1 = $this->uri->segment(1);
                                echo ucwords($string = str_replace("$segment_1", 'Artikel', $segment_1)); ?>
                            </a></li>
                        <li><a href="<?= base_url('Article/detail_article/') . $this->uri->segment(3); ?>">
                                <?php $segment_2 = $this->uri->segment(2);
                                echo ucwords($string = str_replace("$segment_2", 'Detail Artikel', $segment_2)); ?>
                            </a></li>
                        <li><span style="color:red"><?php foreach ($detail_article as $data) : echo $data['article_title'];
                                                    endforeach; ?></span></li>
                    </ul>

                    <?php foreach ($detail_article as $data) : ?>

                        <article class="uk-article">
                            <h1 class="uk-article-title"><?= $data['article_title']; ?></h1>
                            <div class="uk-article-meta uk-margin uk-flex uk-flex-middle">
                                <img class="uk-border-circle uk-avatar-small" src="<?= base_url(); ?>assets/images/users/<?= $data['image']; ?>" alt="Sara Galen">
                                <div>
                                    Ditulis oleh <?= $data['name']; ?>
                                    <time class="uk-margin-small-right" datetime="2019-10-05"><?= $data['article_date_publish']; ?></time><br>
                                    Updated <time datetime="2019-12-30"><?= $data['article_date_modified']; ?></time>
                                </div>
                            </div>
                            <div class="uk-article-content">
                                <p><?php echo  $data['article_content']; ?></p>
                                <figure data-uk-lightbox="animation: slide">
                                    <a class="uk-inline" href="<?= base_url('assets/images/artikel/') . $data['article_image']; ?>" data-caption="Image in lightbox">
                                        <img src="<?= base_url('assets/images/artikel/') . $data['article_image']; ?>" alt="Alt for image">
                                        <div class="uk-position-center">
                                            <span data-uk-overlay-icon></span>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="uk-position-fixed uk-widget-contact uk-position-bottom-right">
            <div class="uk-margin-medium-top uk-float-right">
                <a href="#" class="uk-icon-button uk-box-shadow-medium" data-uk-icon="icon: question; ratio: 1.4" data-uk-toggle="target: #toggle-widget; animation: uk-animation-fade;"></a>
            </div>
        </div>
        <div class="uk-position-fixed uk-widget-contact uk-position-bottom-right">
            <div id="toggle-widget" hidden>
                <div class="uk-card uk-card-small uk-card-default uk-box-shadow-large uk-overflow-hidden">
                    <div class="uk-card-header">
                        <h5 class="">Masukkan pertanyaan anda.
                            <a href="#" data-uk-icon="icon: close; ratio: 1.2" data-uk-toggle="target: #toggle-widget"></a>
                        </h5>
                    </div>
                    <div class="uk-card-body">
                        <form class="uk-form-stacked" method="POST" action="<?= base_url('Consultation_form/add_consultation'); ?>">
                            <div>
                                <label class="uk-form-label uk-text-xsmall" for="name">Nama Lengkap</label>
                                <div class="uk-form-controls">
                                    <input id="name" class="uk-input uk-form-small" name="add_user_full_name" type="text" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="uk-margin-small">
                                <label class="uk-form-label uk-text-xsmall" for="_replyto">Nomor Telepon</label>
                                <div class="uk-form-controls">
                                    <input id="_replyto" class="form-control uk-input uk-form-small" name="add_phone_number" type="text" autocomplete="off" onkeypress="return hanyaAngka(event)" required="">
                                </div>
                            </div>
                            <div class="uk-margin-small">
                                <label class="uk-form-label uk-text-xsmall" for="_replyto">Email</label>
                                <div class="uk-form-controls">
                                    <input id="_replyto" class="form-control uk-input uk-form-small" name="add_user_mail" type="email" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="uk-margin-small">
                                <label class="uk-form-label uk-text-xsmall" for="message">Masalah</label>
                                <div class="uk-form-controls">
                                    <textarea id="message" class=" form-control uk-textarea uk-form-small" name="add_consultation_text" rows="3" minlength="10" autocomplete="off" required=""></textarea>
                                </div>
                            </div>
                            <div class="uk-margin-small">
                                <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div>
                            </div>
                            <div class="uk-text-center">
                                <input class="uk-button uk-button-primary uk-button-small" type="submit" value="Kirim Konsultasi">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>